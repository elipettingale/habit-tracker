<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'habit_id'
    ];

    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }
}
