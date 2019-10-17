<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function () {
    return view('website/home');
})->name('vHome');

Route::get('/feesPay',function () {
    return view('website/feesPay');
})->name('vFeesPay');

Route::get('/principalMessage',function () {
    return view('website/principalMessage');
})->name('vPrincipalMessage');

Route::get('/homework',function () {
    return view('website/homework');
})->name('vHomework');

Route::get('/weekSchedule',function () {
    return view('website/weekSchedule');
})->name('vWeekSchedule');

Route::get('/admissionForm',function () {
    return view('website/admissionForm');
})->name('vAdmissionForm');

Route::get('/contactUs',function () {
    return view('website/contactUs');
})->name('vContactUs');

Route::post('/sendContactMail', 'ContactUsMailer@sendContactMail')->name('sendContactMail');

