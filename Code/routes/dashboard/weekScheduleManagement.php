<?php

/*
|--------------------------------------------------------------------------
| Week Schedule Management View
|--------------------------------------------------------------------------
|
| Here is where you can register Week Schedule Management routes for your dashboard/weekScheduleManagement.
|
*/
use Illuminate\Support\Facades\DB;

Route::get('/addWeekSchedule',['middleware'=>'dashboard_auth',function () {
    return view('dashboard/weekScheduleManagement/addWeekSchedule');
}])->name('vAddWeekSchedule');

Route::get('/viewWeekSchedules',['middleware'=>'dashboard_auth',function () {
    $weekSchedules = DB::select('select * from weekSchedules where deletedAt IS NULL');
    return view('dashboard/weekScheduleManagement/viewWeekSchedules',compact('weekSchedules'));
}])->name('vViewWeekSchedules');

Route::get('/deletedWeekSchedules',['middleware'=>'dashboard_auth',function () {
    $weekSchedules = DB::select('select * from weekSchedules where deletedAt IS NOT NULL');
    return view('dashboard/weekScheduleManagement/deletedWeekSchedules',compact('weekSchedules'));
}])->name('vDeletedWeekSchedules');


// Week Schedule Management Logic View routes : START
Route::post('/addWeekSchedule', ['middleware'=>'dashboard_auth', 'uses'=>'dashboard\WeekSchedule@addWeekSchedule' ])->name('addWeekSchedule');

Route::get('/deleteWeekSchedule/{WeekScheduleID}', ['middleware'=>'dashboard_auth', function($WeekScheduleID){
    DB::update('UPDATE weekSchedules SET deletedAt = CURRENT_TIME() WHERE uniqueID = ? ', [$WeekScheduleID]);
    return redirect()->route('vViewWeekSchedules');
}])->name('deleteWeekSchedule');


Route::get('/deleteWeekSchedulePermanently/{WeekScheduleID}', ['middleware'=>'dashboard_auth', function($WeekScheduleID){

    $WeekSchedule = DB::select('select * from weekSchedules where uniqueID = ? ',[$WeekScheduleID]);
    DB::delete('delete from weekSchedules where uniqueID = ?', [$WeekScheduleID]);
    if(!is_null($WeekSchedule[0]->imageName))
    {
        File::delete(public_path("img/weekSchedule/").$WeekSchedule[0]->imageName);
    }

    return redirect()->route('vDeletedWeekSchedules');

}])->name('deleteWeekSchedulePermanently');


Route::get('/restoreWeekSchedule/{WeekScheduleID}', ['middleware'=>'dashboard_auth', function($WeekScheduleID){

    DB::update('UPDATE weekSchedules SET deletedAt = NULL WHERE uniqueID = ? ', [$WeekScheduleID]);
    return redirect()->route('vDeletedWeekSchedules');

}])->name('restoreWeekSchedule');
// Week Schedule Management Logic View routes : END
