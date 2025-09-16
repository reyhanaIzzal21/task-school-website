<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // 1. Daftar permission (sama seperti rekomendasi di atas)
        $permissions = [
            // Articles
            'articles.view',
            'articles.create',
            'articles.edit',
            'articles.delete',
            'articles.publish',

            // Galleries
            'galleries.view',
            'galleries.create',
            'galleries.edit',
            'galleries.delete',

            // Categories
            'categories.view',
            'categories.create',
            'categories.edit',
            'categories.delete',

            // Users
            'users.view',
            'users.create',
            'users.edit',
            'users.delete',

            // Settings
            'settings.manage',
        ];

        // 2. Buat permission jika belum ada
        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName]);
        }

        // 3. Buat role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $redaksiRole = Role::firstOrCreate(['name' => 'redaksi']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // 4. Assign permission ke role
        // Admin: semua permission
        $adminRole->syncPermissions($permissions);

        // Redaksi: hanya terkait artikel (dan melihat galeri/kategori jika perlu)
        $redaksiPermissions = [
            'articles.view',
            'articles.create',
            'articles.edit',
            'articles.publish',
            'articles.delete',
            'galleries.view',
            'categories.view',
        ];
        $redaksiRole->syncPermissions($redaksiPermissions);

        // User: hanya melihat konten publik
        $userPermissions = [
            'articles.view',
            'galleries.view',
            'categories.view',
        ];
        $userRole->syncPermissions($userPermissions);
    }
}
