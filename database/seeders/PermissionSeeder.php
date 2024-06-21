<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'View employee']);
        Permission::create(['name' => 'Edit employee']);
        Permission::create(['name' => 'Create employee']);
        Permission::create(['name' => 'Delete employee']);

        Permission::create(['name' => 'View client']);
        Permission::create(['name' => 'Edit client']);
        Permission::create(['name' => 'Create client']);
        Permission::create(['name' => 'Delete client']);

        Permission::create(['name' => 'View location']);
        Permission::create(['name' => 'Edit location']);
        Permission::create(['name' => 'Create location']);
        Permission::create(['name' => 'Delete location']);

        Permission::create(['name' => 'View shift']);
        Permission::create(['name' => 'Edit shift']);
        Permission::create(['name' => 'Create shift']);
        Permission::create(['name' => 'Delete shift']);

        Permission::create(['name' => 'View role']);
        Permission::create(['name' => 'Edit role']);
        Permission::create(['name' => 'Create role']);
        Permission::create(['name' => 'Delete role']);


        Permission::create(['name' => 'View permission']);


        Permission::create(['name' => 'View subscription']);
        Permission::create(['name' => 'Edit subscription']);
        Permission::create(['name' => 'Create subscription']);
        Permission::create(['name' => 'Delete subscription']);

        Permission::create(['name' => 'View exercise']);
        Permission::create(['name' => 'Edit exercise']);
        Permission::create(['name' => 'Create exercise']);
        Permission::create(['name' => 'Delete exercise']);

        Permission::create(['name' => 'View muscle group']);
        Permission::create(['name' => 'Edit muscle group']);
        Permission::create(['name' => 'Create muscle group']);
        Permission::create(['name' => 'Delete muscle group']);

        Permission::create(['name' => 'View checkin']);
    }
}
