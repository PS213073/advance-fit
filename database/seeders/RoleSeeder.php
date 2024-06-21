<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Definieer de rollen en maak ze aan
         $roles = ['Super_admin', 'HR_manager', 'Operations_manager', 'System_administrator', 'Training_manager' , 'Employee'];

         foreach ($roles as $roleName) {
             Role::create(['name' => $roleName]);
         }
    }
}
