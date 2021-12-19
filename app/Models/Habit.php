<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Habit extends Model
{
    use SoftDeletes;

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
            ->where('date', tracker_day())
            ->exists();
    }

    public function complete()
    {
        return Log::create([
            'habit_id' => $this->id,
            'date' => tracker_day()
        ]);
    }

    public function incrementStreak()
    {
        $this->streak = $this->streak + 1;

        return $this->save();
    }

    public function resetStreak()
    {
        $this->streak = 0;

        return $this->save();
    }
}
