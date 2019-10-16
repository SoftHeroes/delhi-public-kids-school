<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\eventOfDay\event;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    private $eventProvider;

    public function loadDashBoard(){
        $this->eventProvider = new event(null);

        $Events = $this->eventProvider->getTodayEvent();

        $BirthDays = DB::select('SELECT * FROM students WHERE DAYOFYEAR(dateOfBirth) = DAYOFYEAR(CURRENT_DATE())');
        return view('dashboard/dashboard',compact('BirthDays','Events'));

    }
}
