<?php

/*
|--------------------------------------------------------------------------
| Principal Messages Management View
|--------------------------------------------------------------------------
|
| Here is where you can register Principal Messages Management routes for your dashboard/principalMessagesManagement.
|
*/
use Illuminate\Support\Facades\DB;

Route::get('/addPrincipalMessage',['middleware'=>'dashboard_auth',function () {
    return view('dashboard/principalMessagesManagement/addPrincipalMessage');
}])->name('vAddPrincipalMessage');

Route::get('/viewPrincipalMessages',['middleware'=>'dashboard_auth',function () {
    $principalMessages = DB::select('select * from principalMessages where deletedAt IS NULL');
    return view('dashboard/principalMessagesManagement/viewPrincipalMessages',compact('principalMessages'));
}])->name('vViewPrincipalMessages');

Route::get('/deletedPrincipalMessages',['middleware'=>'dashboard_auth',function () {
    $principalMessages = DB::select('select * from principalMessages where deletedAt IS NOT NULL');
    return view('dashboard/principalMessagesManagement/deletedPrincipalMessages',compact('principalMessages'));
}])->name('vDeletedPrincipalMessages');


// Principal Messages Management Logic View routes : START
Route::post('/addPrincipalMessage', ['middleware'=>'dashboard_auth', 'uses'=>'dashboard\PrincipalMessage@addPrincipalMessage' ])->name('addPrincipalMessage');

Route::get('/deletePrincipalMessages/{principalMessagesID}', ['middleware'=>'dashboard_auth', function($principalMessagesID){
    DB::update('UPDATE principalMessages SET deletedAt = CURRENT_TIME() WHERE uniqueID = ? ', [$principalMessagesID]);
    return redirect()->route('vViewPrincipalMessages');
}])->name('deletePrincipalMessages');


Route::get('/deletePrincipalMessagesPermanently/{principalMessagesID}', ['middleware'=>'dashboard_auth', function($principalMessagesID){
    DB::delete('delete from principalMessages where uniqueID = ?', [$principalMessagesID]);
    return redirect()->route('vDeletedPrincipalMessages');
}])->name('deletePrincipalMessagesPermanently');


Route::get('/restorePrincipalMessages/{principalMessagesID}', ['middleware'=>'dashboard_auth', function($principalMessagesID){
    DB::update('UPDATE principalMessages SET deletedAt = NULL WHERE uniqueID = ? ', [$principalMessagesID]);
    return redirect()->route('vDeletedPrincipalMessages');
}])->name('restorePrincipalMessages');
// Principal Messages Management Logic View routes : END
