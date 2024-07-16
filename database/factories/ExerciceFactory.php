<?php

namespace Database\Factories;

use App\Models\Exercice;
use App\Models\Lesson;
use App\Models\Evaluation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciceFactory extends Factory
{
    protected $model = Exercice::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'order' => $this->faker->numberBetween(1, 10),
            'content' => $this->faker->paragraph(),
            'options' => json_encode($this->faker->words(4, false)),
            'correct_answer' => $this->faker->word(),
            'poster' => $this->faker->imageUrl(640, 480, 'abstract'),
            'lesson_id' => Lesson::factory(),
            // 'evaluation_id' => Evaluation::factory()->nullable(),
        ];
    }
}
