<?php

use App\Models\Certificate;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add official demonstration sample records so no real student names are used as public examples
        Certificate::firstOrCreate(
            ['certificate_code' => 'ICEEDS/SAMPLE/2026/01'],
            [
                'student_name' => 'JOHN DOE (SAMPLE RECORD)',
                'first_name' => 'JOHN',
                'last_name' => 'DOE',
                'course' => 'iCEEDS DIPLOMA IN COUNSELLING PSYCHOLOGY',
                'issue_date' => '2024-08-15',
            ]
        );

        Certificate::firstOrCreate(
            ['certificate_code' => 'ICEEDS/SAMPLE/2026/02'],
            [
                'student_name' => 'JANE SMITH (SAMPLE RECORD)',
                'first_name' => 'JANE',
                'last_name' => 'SMITH',
                'course' => 'POST DIPLOMA IN LEARNING DIFFICULTY MANAGEMENT',
                'issue_date' => '2024-05-20',
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Certificate::whereIn('certificate_code', [
            'ICEEDS/SAMPLE/2026/01',
            'ICEEDS/SAMPLE/2026/02',
        ])->delete();
    }
};
