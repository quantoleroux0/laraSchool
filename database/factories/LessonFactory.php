<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    protected $model = Lesson::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'order' => $this->faker->numberBetween(1, 10),
            'markdown_content' => $this->faker->paragraph(),
            'poster' => $this->faker->imageUrl(640, 480, 'abstract'),
            'chapter_id' => Chapter::factory(),
        ];
    }
}
