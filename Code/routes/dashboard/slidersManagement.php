<?php

/*
|--------------------------------------------------------------------------
| WebSite sliders View
|--------------------------------------------------------------------------
|
| Here is where you can register sliders routes for your dashboard/sliders.
|
*/

use Illuminate\Support\Facades\DB;

Route::get('/createSlider',['middleware'=>'dashboard_auth',function () {
    return view('slidersManagement/createSlider');
}])->name('vCreateSlider');

Route::get('/viewSliders',['middleware'=>'dashboard_auth',function () {

    $sliders = DB::select('select * from sliders where deletedAt IS NULL');

    return view('slidersManagement/viewSliders',compact('sliders'));
}])->name('vViewSliders');

Route::get('/deletedSliders',['middleware'=>'dashboard_auth',function () {
    $sliders = DB::select('select * from sliders where deletedAt IS NOT NULL');
    return view('slidersManagement/deletedSliders',compact('sliders'));
}])->name('vDeletedSliders');

Route::get('/editSlider/{sliderID}', ['middleware'=>'dashboard_auth', function ($sliderID) {
    $resultSet = DB::select('select * from sliders where uniqueID = ? ',[$sliderID]);

    if( count($resultSet) == 0 ){
        return Redirect::back()->withErrors(['Invalid Exception.']);
    }

    $slider = $resultSet[0];
    return view('slidersManagement/editSlider',compact('slider'));
}])->name('vEditSlider');

Route::get('/viewSlider/{sliderID}', ['middleware'=>'dashboard_auth', function ($sliderID) {
    $resultSet = DB::select('select * from sliders where uniqueID = ? ',[$sliderID]);

    if( count($resultSet) == 0 ){
        return Redirect::back()->withErrors(['Invalid Exception.']);
    }

    $slider = $resultSet[0];
    return view('slidersManagement/viewSlider',compact('slider'));
}])->name('vViewSlider');

// Sliders Management Logic View routes : START

Route::post('/createSlider', ['middleware'=>'dashboard_auth', 'uses'=>'SlidersManagement@createSlider' ])->name('createSlider');
Route::post('/updateSlider', ['middleware'=>'dashboard_auth', 'uses'=>'SlidersManagement@updateSlider' ])->name('updateSlider');


Route::get('/deleteSlider/{sliderID}', ['middleware'=>'dashboard_auth', function($sliderID){

    DB::update('UPDATE sliders SET deletedAt = CURRENT_TIME() WHERE uniqueID = ? ', [$sliderID]);
    return redirect()->route('vViewSliders');

}])->name('deleteSlider');


Route::get('/deleteSliderPermanently/{sliderID}', ['middleware'=>'dashboard_auth', function($sliderID){

    $slider = DB::select('select * from sliders where uniqueID = ? ',[$sliderID]);
    DB::delete('delete from sliders where uniqueID = ?', [$sliderID]);
    File::delete(public_path("img/sliders/").$slider[0]->imageName);
    return redirect()->route('vDeletedSliders');

}])->name('deleteSliderPermanently');


Route::get('/restoreSlider/{sliderID}', ['middleware'=>'dashboard_auth', function($sliderID){

    DB::update('UPDATE sliders SET deletedAt = NULL WHERE uniqueID = ? ', [$sliderID]);
    return redirect()->route('vDeletedSliders');

}])->name('restoreSlider');
// Sliders Management Logic View routes : END
