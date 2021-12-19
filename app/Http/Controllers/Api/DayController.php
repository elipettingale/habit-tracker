<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class DayController extends Controller
{
    private $day;

    public function __construct()
    {
        $this->day = tracker_day();
    }

    public function current()
    {
        return Carbon::createFromFormat('Y-m-d', $this->day)
            ->format('D dS');
    }

    public function next()
    {
        $next = Carbon::createFromFormat('Y-m-d', $this->day)
            ->addDay();

        Cache::forever('tracker_day', $next->format('Y-m-d'));

        return $next->format('D dS');
    }
}
