<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id', 'evaluation_id', 'title', 'order', 'content', 'options', 'correct_answer', 'poster'
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
}

?>