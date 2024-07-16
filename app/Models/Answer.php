<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'Exercice_id', 'user_id', 'text_answer', 'selected_option', 'file_answer'
    ];

    public function Exercice()
    {
        return $this->belongsTo(Exercice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

?>