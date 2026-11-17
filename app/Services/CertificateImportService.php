<?php

namespace App\Services;

use App\Models\Certificate;
use DateTime;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;
use RuntimeException;
use ZipArchive;

class CertificateImportService
{
    /**
     * Import certificates from an uploaded file (XLSX or CSV).
     *
     * @param string $filePath Absolute path to the uploaded file
     * @param string $originalExtension File extension (xlsx, csv, etc.)
     * @return array Result stats
     */
    public static function importFromFile(string $filePath, string $originalExtension = ''): array
    {
        $extension = strtolower($originalExtension ?: pathinfo($filePath, PATHINFO_EXTENSION));

        $rows = self::extractRows($filePath, $extension);

        if (empty($rows)) {
            return [
                'success' => false,
                'message' => 'The uploaded spreadsheet contains no readable rows or is empty.',
                'total_rows' => 0,
                'created_count' => 0,
                'updated_count' => 0,
                'skipped_count' => 0,
                'errors' => ['File is empty.'],
            ];
        }

        // Map column indexes
        $mapping = self::detectColumnMapping($rows);
        $headerOffset = $mapping['header_offset'];
        $cols = $mapping['columns'];

        if (!isset($cols['code']) || !isset($cols['name'])) {
            return [
                'success' => false,
                'message' => 'Could not detect required columns. Please ensure your file has columns for Certificate Code/Reg No and Student Name.',
                'total_rows' => count($rows),
                'created_count' => 0,
                'updated_count' => 0,
                'skipped_count' => 0,
                'errors' => ['Missing required columns: Certificate Code and Student Name.'],
            ];
        }

        $created = 0;
        $updated = 0;
        $skipped = 0;
        $rowErrors = [];

        DB::beginTransaction();

        try {
            for ($i = $headerOffset; $i < count($rows); $i++) {
                $row = $rows[$i];
                $rowNum = $i + 1;

                $code = isset($cols['code'], $row[$cols['code']]) ? trim((string) $row[$cols['code']]) : '';
                $name = isset($cols['name'], $row[$cols['name']]) ? trim((string) $row[$cols['name']]) : '';
                $course = isset($cols['course'], $row[$cols['course']]) ? trim((string) $row[$cols['course']]) : '';
                $rawDate = isset($cols['date'], $row[$cols['date']]) ? trim((string) $row[$cols['date']]) : '';

                // Skip entirely empty row
                if ($code === '' && $name === '' && $course === '') {
                    $skipped++;
                    continue;
                }

                if ($code === '' || $name === '') {
                    $skipped++;
                    $rowErrors[] = "Row {$rowNum}: Skipped due to missing Certificate Code or Name.";
                    continue;
                }

                // Clean code: uppercase, trim internal double spaces
                $code = strtoupper(preg_replace('/\s+/', '', $code));
                $name = strtoupper(preg_replace('/\s+/', ' ', $name));
                $course = strtoupper(preg_replace('/\s+/', ' ', $course ?: 'GENERAL DIPLOMA'));

                // Parse date
                $issueDate = self::parseDate($rawDate) ?: date('Y-m-d');

                // Split first and last name
                $parts = preg_split('/\s+/', $name);
                if (count($parts) === 1) {
                    $firstName = $parts[0];
                    $lastName = '';
                } else {
                    $lastName = array_pop($parts);
                    $firstName = implode(' ', $parts);
                }

                $existing = Certificate::whereRaw('LOWER(certificate_code) = ?', [strtolower($code)])->first();

                if ($existing) {
                    $existing->update([
                        'student_name' => $name,
                        'first_name' => $firstName,
                        'last_name' => $lastName,
                        'course' => $course,
                        'issue_date' => $issueDate,
                    ]);
                    $updated++;
                } else {
                    Certificate::create([
                        'certificate_code' => $code,
                        'student_name' => $name,
                        'first_name' => $firstName,
                        'last_name' => $lastName,
                        'course' => $course,
                        'issue_date' => $issueDate,
                    ]);
                    $created++;
                }
            }

            DB::commit();

            return [
                'success' => true,
                'message' => "Spreadsheet processed successfully! {$updated} certificates updated, {$created} added.",
                'total_rows' => count($rows) - $headerOffset,
                'created_count' => $created,
                'updated_count' => $updated,
                'skipped_count' => $skipped,
                'errors' => $rowErrors,
            ];
        } catch (\Throwable $e) {
            DB::rollBack();

            return [
                'success' => false,
                'message' => 'Import failed: ' . $e->getMessage(),
                'total_rows' => count($rows),
                'created_count' => 0,
                'updated_count' => 0,
                'skipped_count' => 0,
                'errors' => [$e->getMessage()],
            ];
        }
    }

    /**
     * Extract raw rows from XLSX or CSV file.
     */
    public static function extractRows(string $filePath, string $extension): array
    {
        if ($extension === 'csv' || $extension === 'txt' || $extension === 'tsv') {
            return self::extractFromCsv($filePath);
        }

        if ($extension === 'xlsx') {
            return self::extractFromXlsx($filePath);
        }

        throw new InvalidArgumentException("Unsupported file type: .{$extension}. Please upload an .xlsx or .csv file.");
    }

    /**
     * Extract rows from CSV file.
     */
    protected static function extractFromCsv(string $filePath): array
    {
        $handle = fopen($filePath, 'r');
        if (!$handle) {
            throw new RuntimeException("Could not open CSV file.");
        }

        // Auto-detect delimiter
        $firstLine = fgets($handle);
        rewind($handle);

        $delimiter = ',';
        if ($firstLine !== false) {
            $semicolons = substr_count($firstLine, ';');
            $commas = substr_count($firstLine, ',');
            $tabs = substr_count($firstLine, "\t");
            if ($semicolons > $commas && $semicolons > $tabs) {
                $delimiter = ';';
            } elseif ($tabs > $commas && $tabs > $semicolons) {
                $delimiter = "\t";
            }
        }

        $rows = [];
        while (($row = fgetcsv($handle, 0, $delimiter)) !== false) {
            if (!empty($row)) {
                // Strip UTF-8 BOM from the first cell
                $row[0] = preg_replace('/^\xEF\xBB\xBF/', '', (string) $row[0]);
                $cleanRow = array_map(fn($v) => trim((string) $v), $row);
                // Filter out empty rows
                if (!empty(array_filter($cleanRow, fn($v) => $v !== ''))) {
                    $rows[] = $cleanRow;
                }
            }
        }
        fclose($handle);

        return $rows;
    }

    /**
     * Extract rows from XLSX file using built-in ZipArchive and SimpleXML.
     */
    protected static function extractFromXlsx(string $filePath): array
    {
        $zip = new ZipArchive();
        if ($zip->open($filePath) !== true) {
            throw new RuntimeException("Could not open XLSX spreadsheet archive.");
        }

        // Read shared strings table
        $sharedStrings = [];
        $sharedStringsXml = $zip->getFromName('xl/sharedStrings.xml');
        if ($sharedStringsXml !== false) {
            $xml = @simplexml_load_string($sharedStringsXml);
            if ($xml) {
                foreach ($xml->si as $si) {
                    if (isset($si->t)) {
                        $sharedStrings[] = (string) $si->t;
                    } elseif (isset($si->r)) {
                        $text = '';
                        foreach ($si->r as $r) {
                            $text .= (string) $r->t;
                        }
                        $sharedStrings[] = $text;
                    } else {
                        $sharedStrings[] = '';
                    }
                }
            }
        }

        // Find primary worksheet (sheet1.xml or first available sheet)
        $sheetXml = $zip->getFromName('xl/worksheets/sheet1.xml');
        if ($sheetXml === false) {
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $name = $zip->getNameIndex($i);
                if (preg_match('#xl/worksheets/sheet\d+\.xml#i', $name)) {
                    $sheetXml = $zip->getFromIndex($i);
                    break;
                }
            }
        }

        if ($sheetXml === false) {
            $zip->close();
            throw new RuntimeException("No worksheet found inside XLSX file.");
        }

        $xml = @simplexml_load_string($sheetXml);
        $zip->close();

        if (!$xml || !isset($xml->sheetData)) {
            return [];
        }

        $rows = [];
        foreach ($xml->sheetData->row as $row) {
            $rowData = [];
            $lastColIdx = -1;

            foreach ($row->c as $c) {
                $cellRef = (string) $c['r'];
                preg_match('/([A-Z]+)(\d+)/', $cellRef, $matches);
                $colLetters = $matches[1] ?? 'A';
                $colIdx = self::columnLetterToIndex($colLetters);

                // Pad missing intermediate cells
                while ($lastColIdx + 1 < $colIdx) {
                    $rowData[] = '';
                    $lastColIdx++;
                }

                $type = (string) $c['t'];
                $val = isset($c->v) ? (string) $c->v : '';

                if ($type === 's') {
                    $idx = (int) $val;
                    $val = $sharedStrings[$idx] ?? '';
                } elseif ($type === 'inlineStr' && isset($c->is->t)) {
                    $val = (string) $c->is->t;
                }

                $rowData[] = trim($val);
                $lastColIdx = $colIdx;
            }

            if (!empty(array_filter($rowData, fn($v) => $v !== ''))) {
                $rows[] = $rowData;
            }
        }

        return $rows;
    }

    /**
     * Convert Excel column letters (A, B, Z, AA, etc.) to 0-based integer index.
     */
    protected static function columnLetterToIndex(string $letters): int
    {
        $letters = strtoupper($letters);
        $num = 0;
        for ($i = 0; $i < strlen($letters); $i++) {
            $num = $num * 26 + (ord($letters[$i]) - ord('A') + 1);
        }
        return $num - 1;
    }

    /**
     * Detect column index mapping from headers or inspection.
     */
    protected static function detectColumnMapping(array $rows): array
    {
        $firstRow = $rows[0] ?? [];

        // Check if row 0 looks like a header
        $isHeader = false;
        $cols = [];

        foreach ($firstRow as $idx => $cell) {
            $norm = strtolower(preg_replace('/[^a-z0-9]/', '', (string) $cell));

            if (preg_match('/^(reg|regno|registration|cert|certno|certificate|certificatecode|serial|serialno|code|codigo)$/', $norm)) {
                $cols['code'] = $idx;
                $isHeader = true;
            } elseif (preg_match('/^(name|student|studentname|candidate|candidatename|fullname|nombre)$/', $norm)) {
                $cols['name'] = $idx;
                $isHeader = true;
            } elseif (preg_match('/^(course|coursename|program|cource|curso|discipline)$/', $norm)) {
                $cols['course'] = $idx;
                $isHeader = true;
            } elseif (preg_match('/^(date|issuedate|dateofissue|exam|fecha|issuance)$/', $norm)) {
                $cols['date'] = $idx;
                $isHeader = true;
            }
        }

        if ($isHeader && isset($cols['code'], $cols['name'])) {
            return [
                'header_offset' => 1,
                'columns' => $cols,
            ];
        }

        // Fallback: If no header matches, examine first 3 rows to auto-detect by contents
        $sampleRow = $rows[0];
        $detected = [];

        foreach ($sampleRow as $idx => $val) {
            $v = trim((string) $val);
            // If contains slash or hyphen code pattern (e.g. IZZA/MLP24/DCP/806 or EDP/TVM24/065)
            if (preg_match('/[A-Z0-9]{2,}\/[A-Z0-9\/_-]{4,}/i', $v) && !isset($detected['code'])) {
                $detected['code'] = $idx;
            } elseif (self::parseDate($v) !== null && !isset($detected['date'])) {
                $detected['date'] = $idx;
            } elseif (preg_match('/(DIPLOMA|CERTIFICATE|COURSE|DEGREE|MANAGEMENT|TRAINING|PSYCHOLOGY)/i', $v) && !isset($detected['course'])) {
                $detected['course'] = $idx;
            }
        }

        // The remaining textual non-numeric column is candidate name
        foreach ($sampleRow as $idx => $val) {
            if (!in_array($idx, $detected, true) && !is_numeric($val) && strlen($val) > 2) {
                $detected['name'] = $idx;
                break;
            }
        }

        // Default standard positional fallback if standard 5-column CSV (S.NO, CODE, NAME, COURSE, DATE)
        if (count($sampleRow) >= 5 && !isset($detected['code'])) {
            $detected = [
                'code' => 1,
                'name' => 2,
                'course' => 3,
                'date' => 4,
            ];
        }

        return [
            'header_offset' => 0,
            'columns' => $detected,
        ];
    }

    /**
     * Robust date parser handling DD/MM/YYYY, YYYY-MM-DD, and Excel numeric serial dates.
     */
    public static function parseDate(string|int|float $value): ?string
    {
        $v = trim((string) $value);
        if ($v === '') {
            return null;
        }

        // Check if numeric Excel serial date (between year 1970 and 2100 ~ 25569 to 73050)
        if (is_numeric($v) && (float) $v >= 20000 && (float) $v <= 80000) {
            $days = (float) $v;
            $timestamp = ($days - 25569) * 86400;
            return gmdate('Y-m-d', (int) $timestamp);
        }

        // Common string date formats (Day/Month/Year prioritized for Indian format)
        $formats = [
            'd/m/Y',
            'd-m-Y',
            'd.m.Y',
            'Y-m-d',
            'Y/m/d',
            'm/d/Y',
            'j/n/Y',
            'j-n-Y',
        ];

        foreach ($formats as $fmt) {
            $d = DateTime::createFromFormat($fmt, $v);
            if ($d && $d->format($fmt) === $v) {
                return $d->format('Y-m-d');
            }
        }

        $timestamp = strtotime($v);
        if ($timestamp !== false && $timestamp > 0) {
            return date('Y-m-d', $timestamp);
        }

        return null;
    }
}
