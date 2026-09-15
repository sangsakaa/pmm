<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::firstOrCreate([
            'name' => 'superAdmin',
            'guard_name' => 'web',
        ]);

        Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        Role::firstOrCreate([
            'name' => 'guru',
            'guard_name' => 'web',
        ]);

        $this->command->info('Role berhasil dibuat:');
        $this->command->info('✓ superAdmin');
        $this->command->info('✓ admin');
        $this->command->info('✓ guru');
    }
}
