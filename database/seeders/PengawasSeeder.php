<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PengawasSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat role pengawas jika belum ada
        $role = Role::firstOrCreate([
            'name' => 'pengawas',
            'guard_name' => 'web',
        ]);

        // Buat user pengawas
        $pengawas = User::firstOrCreate(
            [
                'email' => 'pengawas@pmm.sch.id',
            ],
            [
                'name' => 'Pengawas PMM',
                'password' => Hash::make('password'),
            ]
        );

        // Pastikan memiliki role pengawas
        $pengawas->syncRoles([$role]);

        $this->command->info('Role pengawas berhasil dibuat.');
        $this->command->info('User Pengawas berhasil dibuat.');
        $this->command->info('Email    : pengawas@pmm.sch.id');
        $this->command->info('Password : password');
    }
}
