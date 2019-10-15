<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use File;

class WeekSchedule extends Controller
{

    public function addWeekSchedule(Request $request){

        $files = $request->file('files'); // storing files in variable
        $weekscheduleClass = trim($request->input('weekscheduleClass'));
        $weekscheduleDescription = trim($request->input('weekscheduleDescription'));

        $weekdate = (string)date("Y-m-d", strtotime(str_replace('/', '-', trim($request->input('selectedWeek')))));

        $startDate = DB::select('select DATE_ADD(?, INTERVAL - WEEKDAY(?) DAY) startDate', [$weekdate,$weekdate])[0]->startDate;
        $endDate = DB::select('select DATE_ADD(?, INTERVAL 6 - WEEKDAY(?) DAY) endDate', [$weekdate,$weekdate])[0]->endDate;

        $newName = null;
        if(!is_null($files)){
            if($files[0]->getError()){
                $error = ValidationException::withMessages(['Unable to upload file!']);
                throw $error;
            }

            $newName = uniqid() .".".$files[0]->getClientOriginalExtension();

            $files[0]->move(public_path("img/weekSchedule"), $newName);
        }

        DB::beginTransaction();
        try {

            DB::insert('insert into weekSchedules (class , text, imageName , startDate , endDate) values ( ?, ?, ?, ?, ?)', [ $weekscheduleClass, $weekscheduleDescription, $newName, $startDate, $endDate]);

            DB::commit();

            return redirect()->back()->with('message', 'Week Schedule added successfully.');

        } catch (Exception $e) {
            DB::rollback();
            $error = ValidationException::withMessages([$e->getMessage()]);
            throw $error;
        }
    }
}
