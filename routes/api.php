<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HabitController;

Route::get('habits', [HabitController::class, 'index']);
Route::post('habits/{habit}/complete', [HabitController::class, 'complete']);
