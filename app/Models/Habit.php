<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'color',
        'target'
    ];

    protected $appends = [
        'is_completed'
    ];

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function getIsCompletedAttribute()
    {
        return $this->logs()
            ->where('date', today())
            ->exists();
    }

    public function complete()
    {
        return Log::create([
            'habit_id' => $this->id,
            'date' => today()
        ]);
    }
}
