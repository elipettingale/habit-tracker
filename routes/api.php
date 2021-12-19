<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HabitController;
use App\Http\Controllers\Api\DayController;

Route::get('habits', [HabitController::class, 'index']);
Route::post('habits', [HabitController::class, 'store']);
Route::post('habits/{habit}/complete', [HabitController::class, 'complete']);

Route::get('day', [DayController::class, 'current']);
Route::post('day', [DayController::class, 'next']);
