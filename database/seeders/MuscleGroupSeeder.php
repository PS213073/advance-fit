<?php

namespace Database\Seeders;

use App\Models\MuscleGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MuscleGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $muscle_groups = [
            ['name' => 'Chest'],
            ['name' => 'Back'],
            ['name' => 'Legs'],
            ['name' => 'Shoulders'],
            ['name' => 'Arms'],
            ['name' => 'Abs'],
            ['name' => 'Cardio'],
            ['name' => 'Full Body'],
        ];

        foreach ($muscle_groups as $muscle_group) {
            MuscleGroup::create($muscle_group);
        }
    }
}
