<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Habit\StoreHabitRequest;
use App\Models\Habit;

class HabitController
{
    public function index()
    {
        return Habit::all();
    }

    public function store(StoreHabitRequest $request)
    {
        return Habit::create($request->all());
    }

    public function complete(Habit $habit)
    {
        if (!$habit->complete()) {
            return false;
        }

        return $habit;
    }
}
