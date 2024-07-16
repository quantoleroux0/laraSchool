<?php

namespace Database\Factories;

use App\Models\Evaluation;
use App\Models\Matiere;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvaluationFactory extends Factory
{
    protected $model = Evaluation::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'poster' => $this->faker->imageUrl(640, 480, 'abstract'),
            'matiere_id' => Matiere::factory(),
        ];
    }
}
