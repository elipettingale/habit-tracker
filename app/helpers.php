<?php

use Illuminate\Support\Facades\Cache;

function tracker_day()
{
    return Cache::get('tracker_day', today()->format('Y-m-d'));
}
