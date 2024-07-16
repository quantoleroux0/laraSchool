<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Exercice;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    protected $model = Answer::class;

    public function definition()
    {
        return [
            'Exercice_id' => Exercice::factory(),
            'user_id' => User::factory(),
            'text_answer' => $this->faker->paragraph(),
            'selected_option' => $this->faker->word(),
            'file_answer' => $this->faker->imageUrl(640, 480, 'abstract'),
        ];
    }
}
