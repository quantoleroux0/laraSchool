<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Level;
use App\Models\Subscription;
use App\Models\Matiere;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Exercice;
use App\Models\Answer;
use App\Models\Evaluation;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Level::factory()->count(5)->create();
        
        User::factory()->count(10)->create()->each(function ($user) {
            Subscription::factory()->create(['user_id' => $user->id]);
        });

        Answer::factory()->count(10)->create();

        Matiere::factory()->count(5)->create()->each(function ($matiere) {
            Chapter::factory()->count(3)->create(['matiere_id' => $matiere->id])->each(function ($chapter) {
                Lesson::factory()->count(3)->create(['chapter_id' => $chapter->id])->each(function ($lesson) {
                    Exercice::factory()->count(3)->create(['lesson_id' => $lesson->id]);
                });
            });

            Evaluation::factory()->count(5)->create(['matiere_id' => $matiere->id])->each(function ($evaluation) {
                // Exercice::factory()->count(3)->create(['evaluation_id' => $evaluation->id]);
            });

        });

    }
}
