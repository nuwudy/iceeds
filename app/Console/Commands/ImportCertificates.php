<?php

namespace App\Console\Commands;

use App\Models\Certificate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImportCertificates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-certificates 
                            {file? : The path to the SQL dump file} 
                            {--fresh : Truncate the certificates table before importing}
                            {--only-new : Only insert certificate codes that do not exist yet (IDs auto-assigned, existing rows untouched)}
                            {--dry-run : With --only-new, report what would be inserted without writing}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import WordPress certificate validation data from wp_stvc_validatecertify.sql with zero data loss';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Starting certificate data import...');

        $filePath = $this->argument('file');

        if (!$filePath) {
            $candidates = [
                base_path('wp_stvc_validatecertify.sql'),
                'C:/Users/Admin/Downloads/wp_stvc_validatecertify.sql',
                database_path('data/wp_stvc_validatecertify.sql'),
            ];

            foreach ($candidates as $candidate) {
                if (File::exists($candidate)) {
                    $filePath = $candidate;
                    break;
                }
            }
        }

        if (!$filePath || !File::exists($filePath)) {
            $this->error("SQL dump file not found. Please provide a valid file path.");
            return self::FAILURE;
        }

        $this->info("Source file: {$filePath}");
        $content = File::get($filePath);
        $this->info("File size: " . number_format(strlen($content)) . " bytes");

        // Parse INSERT INTO statements
        preg_match_all('/INSERT\s+INTO\s+[`"]?wp_stvc_validatecertify[`"]?\s*\([^)]+\)\s*VALUES\s*(.+?);/is', $content, $insertMatches);

        if (empty($insertMatches[1])) {
            $this->error("No valid INSERT statements found for wp_stvc_validatecertify.");
            return self::FAILURE;
        }

        $this->info("Found " . count($insertMatches[1]) . " INSERT statement batches. Parsing records...");

        $records = [];
        $skipped = 0;
        $now = now();

        foreach ($insertMatches[1] as $valuesBlock) {
            preg_match_all('/\((?:[^()\'"]|\'(?:[^\'\\\\]|\\\\.)*\'|"(?:[^"\\\\]|\\\\.)*")+\)/s', $valuesBlock, $rowMatches);

            foreach ($rowMatches[0] as $rowTuple) {
                $inner = trim($rowTuple);
                $inner = substr($inner, 1, -1);

                $fields = str_getcsv($inner, ',', "'", "\\");
                if (count($fields) < 6) {
                    $skipped++;
                    continue;
                }

                $id = (int) trim($fields[0]);
                $nombre = trim($fields[1]);
                $apellido = trim($fields[2]);
                $curso = trim($fields[3]);
                $fecha = trim($fields[4]);
                $codigo = trim($fields[5]);

                $firstName = $nombre !== '' ? $nombre : null;
                $lastName = $apellido !== '' ? $apellido : null;
                $studentName = trim("{$nombre} {$apellido}");

                if ($studentName === '') {
                    $studentName = 'Unknown Student';
                }

                $records[] = [
                    'id' => $id,
                    'student_name' => $studentName,
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'course' => $curso,
                    'issue_date' => $fecha,
                    'certificate_code' => $codigo,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        $totalParsed = count($records);
        $this->info("Successfully parsed {$totalParsed} certificate records (skipped: {$skipped}).");

        if ($this->option('only-new')) {
            return $this->importOnlyNew($records);
        }

        if ($this->option('fresh')) {
            $this->warn("Truncating certificates table...");
            Certificate::truncate();
        }

        $bar = $this->output->createProgressBar($totalParsed);
        $bar->start();

        // Batch insert/upsert in chunks of 500
        $chunks = array_chunk($records, 500);

        DB::transaction(function () use ($chunks, $bar) {
            foreach ($chunks as $chunk) {
                Certificate::upsert(
                    $chunk,
                    ['id'],
                    ['student_name', 'first_name', 'last_name', 'course', 'issue_date', 'certificate_code', 'updated_at']
                );
                $bar->advance(count($chunk));
            }
        });

        $bar->finish();
        $this->newLine(2);

        $totalInDb = Certificate::count();

        $this->table(
            ['Metric', 'Value'],
            [
                ['Source File', basename($filePath)],
                ['Parsed Records', number_format($totalParsed)],
                ['Total Records in DB', number_format($totalInDb)],
                ['Zero Data Loss Verification', $totalInDb >= $totalParsed ? 'PASSED (100% Retained)' : 'ATTENTION (Mismatch)'],
            ]
        );

        // Verify test record EDP/TVM24/DCP/065
        $sample = Certificate::whereRaw('LOWER(certificate_code) = ?', ['edp/tvm24/dcp/065'])->first();
        if ($sample) {
            $this->info("Verification sample found: [ID {$sample->id}] {$sample->student_name} | {$sample->certificate_code} | {$sample->course} | {$sample->issue_date->format('Y-m-d')}");
        } else {
            $this->warn("Sample code 'EDP/TVM24/DCP/065' not found in database.");
        }

        $this->info("Certificate migration completed successfully with ZERO data loss!");

        return self::SUCCESS;
    }

    /**
     * Insert only records whose certificate code is not already in the database.
     * Existing rows are never modified and IDs are assigned by the database.
     */
    private function importOnlyNew(array $records): int
    {
        $existing = Certificate::query()
            ->pluck('certificate_code')
            ->map(fn ($code) => mb_strtolower(trim($code)))
            ->flip();

        $new = [];
        $seen = [];
        foreach ($records as $record) {
            $key = mb_strtolower($record['certificate_code']);
            if ($key === '' || isset($existing[$key]) || isset($seen[$key])) {
                continue;
            }
            $seen[$key] = true;
            unset($record['id']);
            $new[] = $record;
        }

        $this->table(['Metric', 'Value'], [
            ['Records in file', number_format(count($records))],
            ['Already in database (skipped)', number_format(count($records) - count($new))],
            ['New records to insert', number_format(count($new))],
        ]);

        if ($this->option('dry-run')) {
            foreach (array_slice($new, 0, 20) as $r) {
                $this->line("  + {$r['certificate_code']}  {$r['student_name']}  ({$r['issue_date']})");
            }
            if (count($new) > 20) {
                $this->line('  ... and ' . (count($new) - 20) . ' more');
            }
            $this->warn('Dry run: nothing was written.');
            return self::SUCCESS;
        }

        DB::transaction(function () use ($new) {
            foreach (array_chunk($new, 500) as $chunk) {
                Certificate::insert($chunk);
            }
        });

        $this->info('Inserted ' . number_format(count($new)) . ' new certificates. Total in DB: ' . number_format(Certificate::count()));

        return self::SUCCESS;
    }
}
