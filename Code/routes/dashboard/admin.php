<?php

/*
|--------------------------------------------------------------------------
| WebSite admin View
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your dashboard/admin.
|
*/

Route::get('/admin',['middleware'=>'dashboard_login',function () {
    return view('admin');
}])->name('vAdmin');

// Admin Logic View routes : START
Route::post('/userLogin', 'Login@userLogin')->name('userLogin');

Route::get('/userLogout', 'Login@userLogout')->name('userLogout');
// Admin Logic View routes : END
