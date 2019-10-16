<?php

/*
|--------------------------------------------------------------------------
| Video Gallery Management View
|--------------------------------------------------------------------------
|
| Here is where you can register Video Gallery Management routes for your dashboard/videoGallery.
|
*/

use Illuminate\Support\Facades\DB;

Route::get('/addVideoGallery',['middleware'=>'dashboard_auth',function () {
    return view('dashboard/videoManagement/addVideo');
}])->name('vAddVideo');

Route::get('/viewVideos',['middleware'=>'dashboard_auth',function () {
    $videos = DB::select('select * from videoGallery where deletedAt IS NULL');
    return view('dashboard/videoManagement/viewVideos',compact('videos'));
}])->name('vViewVideos');

Route::get('/deletedVideos',['middleware'=>'dashboard_auth',function () {
    $videos = DB::select('select * from videoGallery where deletedAt IS NOT NULL');
    return view('dashboard/videoManagement/deletedVideos',compact('videos'));
}])->name('vDeletedVideos');

// Video Gallery Logic View routes : START
Route::post('/addVideo', ['middleware'=>'dashboard_auth', 'uses'=>'dashboard\Video@addVideo' ])->name('addVideo');

Route::get('/deleteVideo/{videoID}', ['middleware'=>'dashboard_auth', function($videoID){
    DB::update('UPDATE videoGallery SET deletedAt = CURRENT_TIME() WHERE uniqueID = ? ', [$videoID]);
    return redirect()->route('vViewVideos');
}])->name('deleteVideo');


Route::get('/deleteVideoPermanently/{videoID}', ['middleware'=>'dashboard_auth', function($videoID){

    $video = DB::select('select * from videoGallery where uniqueID = ? ',[$videoID]);
    DB::delete('delete from videoGallery where uniqueID = ?', [$videoID]);

    File::delete(public_path("img/videoGallery/").$video[0]->videoName);

    return redirect()->route('vDeletedVideos');

}])->name('deleteVideoPermanently');


Route::get('/restoreVideo/{videoID}', ['middleware'=>'dashboard_auth', function($videoID){

    DB::update('UPDATE videoGallery SET deletedAt = NULL WHERE uniqueID = ? ', [$videoID]);
    return redirect()->route('vDeletedVideos');

}])->name('restoreVideo');
// Video Gallery Logic View routes : START
