<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/getAllSlider',function () {
    $url = URL::asset('/img/sliders');
    $sliders = DB::select("select uniqueID,title,CONCAT(?,'/',imageName) imagePath from sliders where deletedAt IS NULL",[$url]);

    return response()->json($sliders);
});
