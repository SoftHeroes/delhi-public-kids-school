<?php

/*
|--------------------------------------------------------------------------
| WebSite forgetPassword View
|--------------------------------------------------------------------------
|
| Here is where you can register forgetPassword routes for your dashboard/forgetPassword.
|
*/

Route::get('/forgetPassword/{emailID}/{source}/{language}',['middleware'=>'dashboard_login', function ($emailID, $source, $language) {
    return view('forgetPassword', compact('emailID', 'source', 'language'));
}])->name('vForgetPassword');

// Admin Logic View routes : START
Route::get('/resendOTP','forgetPassword@sendOTP')->name('resendOTP');
Route::post('/resetPassword', 'forgetPassword@resetPassword')->name('resetPassword');
// Admin Logic View routes : END
