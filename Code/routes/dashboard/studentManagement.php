<?php

/*
|--------------------------------------------------------------------------
| Student Management View
|--------------------------------------------------------------------------
|
| Here is where you can register Student Management routes for your dashboard/studentsManagement.
|
*/
use Illuminate\Support\Facades\DB;

Route::get('/addStudent',['middleware'=>'dashboard_auth',function () {
    return view('dashboard/studentManagement/addStudent');
}])->name('vAddStudent');

Route::get('/viewStudents',['middleware'=>'dashboard_auth',function () {
    $students = DB::select('select * from students where deletedAt IS NULL');
    return view('dashboard/studentManagement/viewStudents',compact('students'));
}])->name('vViewStudents');

Route::get('/deletedStudents',['middleware'=>'dashboard_auth',function () {
    $students = DB::select('select * from students where deletedAt IS NOT NULL');
    return view('dashboard/studentManagement/deletedStudents',compact('students'));
}])->name('vDeletedStudents');


// Student Management Logic View routes : START
Route::post('/addStudent', ['middleware'=>'dashboard_auth', 'uses'=>'dashboard\Student@addStudent' ])->name('addStudent');

Route::get('/deleteStudent/{studentID}', ['middleware'=>'dashboard_auth', function($studentID){
    DB::update('UPDATE students SET deletedAt = CURRENT_TIME() WHERE uniqueID = ? ', [$studentID]);
    return redirect()->route('vViewStudents');
}])->name('deleteStudent');


Route::get('/deleteStudentPermanently/{studentID}', ['middleware'=>'dashboard_auth', function($studentID){
    $student = DB::select('select * from students where uniqueID = ? ',[$studentID]);
    DB::delete('delete from students where uniqueID = ?', [$studentID]);
    File::delete(public_path("img/student/").$student[0]->imageName);
    return redirect()->route('vDeletedStudents');
}])->name('deleteStudentPermanently');


Route::get('/restoreStudent/{studentID}', ['middleware'=>'dashboard_auth', function($studentID){
    DB::update('UPDATE students SET deletedAt = NULL WHERE uniqueID = ? ', [$studentID]);
    return redirect()->route('vDeletedStudents');
}])->name('restoreStudent');
// Student Management Logic View routes : END
