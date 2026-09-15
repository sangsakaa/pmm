<?php

namespace Database\Seeders;

use Database\Seeders\ModulSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\TopikSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // RoleSeeder::class,
            // UserSeeder::class,
            // TopikSeeder::class,
            // ModulSeeder::class,
            // PengawasSeeder::class,
            GuruSeeder::class,
        ]);
    }
}
