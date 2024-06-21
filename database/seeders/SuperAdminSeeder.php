<?php

namespace Database\Seeders;

use App\Models\Frontuser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Maak de standaard gebruiker aan
        $user = User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'date_of_birth' => '1990-01-01', // '1990-01-01
            'password' => bcrypt('admin'),
        ]);

        $frontuser = Frontuser::create([
            'first_name' => 'daniel',
            'last_name' => 'shahzada',
            'email' => 'test@test.com',
            'phone_number' => '1234567890',
            'address' => 'test',
            'postal_code' => '1234AB',
            'city' => 'test',
            'date_of_birth' => '1998-01-01',
            'subscription_id' => '1',
            'password' => bcrypt('test'),
        ]);

        // Find or create the manager role
        $managerRole = Role::firstOrCreate(['name' => 'Super_admin']);

        // Assign all permissions to the manager role
        $permissions = Permission::all();
        $managerRole->syncPermissions($permissions);

        // Assign the manager role to the user
        $user->assignRole($managerRole);

        // $managerRole = Role::where('name', 'manager')->first();
        // $user->assignRole($managerRole);
        // $user->givePermissionTo(Permission::all());

    }
}
