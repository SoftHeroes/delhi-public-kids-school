<?php

/*
|--------------------------------------------------------------------------
| Dashboard Homework Management View
|--------------------------------------------------------------------------
|
| Here is where you can register sliders routes for your dashboard/homeworkManagement.
|
*/

use Illuminate\Support\Facades\DB;

Route::get('/addHomework',['middleware'=>'dashboard_auth',function () {
    return view('dashboard/homeworkManagement/addHomework');
}])->name('vAddHomework');

Route::get('/viewHomeworks',['middleware'=>'dashboard_auth',function () {
    $homeworks = DB::select('select * from homeworks where deletedAt IS NULL');
    return view('dashboard/homeworkManagement/viewHomeworks',compact('homeworks'));
}])->name('vViewHomeworks');

Route::get('/deletedHomeworks',['middleware'=>'dashboard_auth',function () {
    $homeworks = DB::select('select * from homeworks where deletedAt IS NOT NULL');
    return view('dashboard/homeworkManagement/deletedHomeworks',compact('homeworks'));
}])->name('vDeletedHomeworks');

Route::get('/viewHomework/{homeworkID}',['middleware'=>'dashboard_auth',function ($homeworkID) {
    $homework = DB::select('select * from homeworks where uniqueID = ? ', [$homeworkID])[0];
    return view('dashboard/homeworkManagement/viewHomework',compact('homework'));
}])->name('vViewHomework');

// Homework Management Logic View routes : START
Route::post('/addHomework', ['middleware'=>'dashboard_auth', 'uses'=>'dashboard\HomeworkManagement@addHomework' ])->name('addHomework');


Route::get('/deleteHomework/{HomeworkID}', ['middleware'=>'dashboard_auth', function($HomeworkID){
    DB::update('UPDATE homeworks SET deletedAt = CURRENT_TIME() WHERE uniqueID = ? ', [$HomeworkID]);
    return redirect()->route('vViewHomeworks');
}])->name('deleteHomework');


Route::get('/deleteHomeworkPermanently/{homeworkID}', ['middleware'=>'dashboard_auth', function($homeworkID){

    $homework = DB::select('select * from homeworks where uniqueID = ? ',[$homeworkID]);
    DB::delete('delete from homeworks where uniqueID = ?', [$homeworkID]);
    if(!is_null($homework[0]->imageName))
    {
        File::delete(public_path("img/homework/").$homework[0]->imageName);
    }

    return redirect()->route('vDeletedHomeworks');

}])->name('deleteHomeworkPermanently');


Route::get('/restoreHomework/{homeworkID}', ['middleware'=>'dashboard_auth', function($homeworkID){

    DB::update('UPDATE homeworks SET deletedAt = NULL WHERE uniqueID = ? ', [$homeworkID]);
    return redirect()->route('vDeletedHomeworks');

}])->name('restoreHomework');

// Homework Management Logic View routes : END
