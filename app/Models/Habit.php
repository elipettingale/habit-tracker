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
}
