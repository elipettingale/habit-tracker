<?php

namespace App\Http\Controllers\Api;

use App\Models\Habit;

class HabitController
{
    public function index()
    {
        return Habit::all();
    }
}
