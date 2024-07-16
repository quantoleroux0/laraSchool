<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'poster', 'matiere_id',
    ];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}

?>