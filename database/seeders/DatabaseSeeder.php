<?php

namespace Database\Seeders;

use App\Models\Frontuser;
use App\Models\Location;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Frontuser::factory()->count(10)->create();
        //        Location::factory()->count(10)->create();

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(SubscriptionSeeder::class);
        $this->call(SuperAdminSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(ExerciseSeeder::class);
        $this->call(MuscleGroupSeeder::class);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
