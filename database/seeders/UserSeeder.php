<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // pastikan role sudah ada, kalau belum buat
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $redaksiRole = Role::firstOrCreate(['name' => 'redaksi']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // buat akun admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('SCHOOL-WEBSITE-admin'),
            ]
        );
        $admin->assignRole($adminRole);

        // buat akun redaksi
        $redaksi = User::firstOrCreate(
            ['email' => 'redaksi@gmail.com'],
            [
                'name' => 'Redaksi Satu',
                'password' => Hash::make('password'),
            ]
        );
        $redaksi->assignRole($redaksiRole);
    }
}
