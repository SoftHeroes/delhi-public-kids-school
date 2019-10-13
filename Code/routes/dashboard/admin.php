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
    return view('dashboard/admin');
}])->name('vAdmin');

// Admin Logic View routes : START
Route::post('/userLogin', 'dashboard\Login@userLogin')->name('userLogin');

Route::get('/userLogout', 'dashboard\Login@userLogout')->name('userLogout');
// Admin Logic View routes : END
