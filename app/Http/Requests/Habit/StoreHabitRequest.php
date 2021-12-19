<?php

namespace App\Http\Requests\Habit;

use Illuminate\Foundation\Http\FormRequest;

class StoreHabitRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'icon' => ['required'],
            'color' => ['required'],
            'target' => ['required']
        ];
    }
}
