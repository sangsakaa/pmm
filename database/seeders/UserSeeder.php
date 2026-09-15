<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // SUPER ADMIN
        $superAdmin = User::firstOrCreate(
            [
                'email' => 'admin@admin.com',
            ],
            [
                'name' => 'Super Administrator',
                'password' => Hash::make('password'),
            ]
        );

        $superAdmin->syncRoles(['superAdmin']);


        // ADMIN
        $admin = User::firstOrCreate(
            [
                'email' => 'admin.pmm@smawahidiyahkediri.my.id',
            ],
            [
                'name' => 'Administrator PMM',
                'password' => Hash::make('password'),
            ]
        );

        $admin->syncRoles(['admin']);


        // GURU
        $guru = User::firstOrCreate(
            [
                'email' => 'guru@smawahidiyahkediri.my.id',
            ],
            [
                'name' => 'Guru PMM',
                'password' => Hash::make('password'),
            ]
        );

        $guru->syncRoles(['guru']);

        $this->command->info('User berhasil dibuat.');
        $this->command->info('SuperAdmin : admin@admin.com / password');
        $this->command->info('Admin      : admin.pmm@smawahidiyahkediri.my.id / password');
        $this->command->info('Guru       : guru@smawahidiyahkediri.my.id / password');
    }
}
