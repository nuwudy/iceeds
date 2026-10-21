<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'drvbmriyas@gmail.com'],
            [
                'name' => 'Dr. V. B. M. Riyas',
                'password' => \Illuminate\Support\Facades\Hash::make('riyas.chairman@123'),
            ]
        );

        $this->call(TestimonialAndBlogSeeder::class);
    }
}
