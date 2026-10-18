<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin 
                            {email=drvbmriyas@gmail.com : The admin email address} 
                            {password=riyas.chairman@123 : The admin password} 
                            {name=Dr. V. B. M. Riyas : The admin name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create or update the administrator account for iCEEDS Media Library and Admin Portal';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $email = (string) $this->argument('email');
        $password = (string) $this->argument('password');
        $name = (string) $this->argument('name');

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make($password),
            ]
        );

        $this->info("Administrator account ready!");
        $this->table(
            ['Field', 'Value'],
            [
                ['Name', $user->name],
                ['Email', $user->email],
                ['Password', $password],
                ['Admin URL', url('/admin/login')],
            ]
        );

        return self::SUCCESS;
    }
}
