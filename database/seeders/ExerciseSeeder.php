<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exercises = [
            ['name' => 'Push-ups', 'video_tutorial' => 'https://www.youtube.com/watch?v=IODxDxX7oi4'],
            ['name' => 'Squats', 'video_tutorial' => 'https://www.youtube.com/watch?v=YaXPRqUwItQ'],
            ['name' => 'Lunges', 'video_tutorial' => 'https://www.youtube.com/watch?v=UpyDdQjBTa0'],
            ['name' => 'Burpees', 'video_tutorial' => 'https://www.youtube.com/watch?v=dZgVxmf6jkA'],
            ['name' => 'Planks', 'video_tutorial' => 'https://www.youtube.com/watch?v=ASdvN_XEl_c'],
            ['name' => 'Sit-ups', 'video_tutorial' => 'https://www.youtube.com/watch?v=jDwoBqPH0jk'],
            ['name' => 'Jumping Jacks', 'video_tutorial' => 'https://www.youtube.com/watch?v=c4tMp5RyNq4'],
            ['name' => 'Mountain Climbers', 'video_tutorial' => 'https://www.youtube.com/watch?v=nmwgirgXLYM'],
            ['name' => 'Calf Raises', 'video_tutorial' => 'https://www.youtube.com/watch?v=TdSg9kQp1-E'],
            ['name' => 'Tricep Dips', 'video_tutorial' => 'https://www.youtube.com/watch?v=HZifvGpnrFY']
        ];

        foreach ($exercises as $exercise) {
            Exercise::create($exercise);
        }
    }
}
