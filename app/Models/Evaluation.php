<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'matiere_id', 'title', 'poster'
    ];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function Exercices()
    {
        return $this->hasMany(Exercice::class);
    }
}

?>