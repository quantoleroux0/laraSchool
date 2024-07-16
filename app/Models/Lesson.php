<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'order', 'markdown_content', 'poster', 'chapter_id',
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
?>