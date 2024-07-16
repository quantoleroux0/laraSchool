<?php

namespace Database\Factories;

use App\Models\Chapter;
use App\Models\Matiere;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChapterFactory extends Factory
{
    protected $model = Chapter::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'poster' => $this->faker->imageUrl(640, 480, 'abstract'),
            'matiere_id' => Matiere::factory(),
        ];
    }
}
