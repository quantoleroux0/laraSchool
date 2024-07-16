<?php
namespace App\Models;

use Illuminate\Support\Facades\Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'start_date', 'end_date', 'is_active','status','transaction_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function save(array $options = [])
    {
        if ($this->end_date < Date::now()) {
            $this->is_active = false;
        }

        parent::save($options);
    }
}
?>