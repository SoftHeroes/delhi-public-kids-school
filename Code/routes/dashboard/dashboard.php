<?php

/*
|--------------------------------------------------------------------------
| WebSite admin View
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your dashboard/admin.
|
*/

Route::get('/dashboard',['middleware'=>'dashboard_auth','uses'=>'dashboard\Dashboard@loadDashBoard'])->name('vDashboard');

Route::get('/createCollage',['middleware'=>'dashboard_auth',function () {
    return view('dashboard/createCollage');
}])->name('vCreateCollage');
