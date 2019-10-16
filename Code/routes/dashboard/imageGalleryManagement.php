<?php

/*
|--------------------------------------------------------------------------
| Image Gallery Management View
|--------------------------------------------------------------------------
|
| Here is where you can register Image Gallery Management routes for your dashboard/imageGallery.
|
*/

use Illuminate\Support\Facades\DB;

Route::get('/addImageGallery',['middleware'=>'dashboard_auth',function () {
    return view('dashboard/imageGalleryManagement/addImageGallery');
}])->name('vAddImageGallery');

Route::get('/viewImageGalleries',['middleware'=>'dashboard_auth',function () {
    $imageGalleries = DB::select('select * from imageGallery where deletedAt IS NULL');
    return view('dashboard/imageGalleryManagement/viewImageGalleries',compact('imageGalleries'));
}])->name('vViewImageGalleries');

Route::get('/deletedImageGalleries',['middleware'=>'dashboard_auth',function () {
    $imageGalleries = DB::select('select * from imageGallery where deletedAt IS NOT NULL');
    return view('dashboard/imageGalleryManagement/deletedImageGalleries',compact('imageGalleries'));
}])->name('vDeletedImageGalleries');

// ImageGallery Logic View routes : START
Route::post('/addImageGallery', ['middleware'=>'dashboard_auth', 'uses'=>'dashboard\ImageGallery@addImageGallery' ])->name('addImageGallery');

Route::get('/deleteImageGallery/{ImageGalleryID}', ['middleware'=>'dashboard_auth', function($ImageGalleryID){
    DB::update('UPDATE imageGallery SET deletedAt = CURRENT_TIME() WHERE uniqueID = ? ', [$ImageGalleryID]);
    return redirect()->route('vViewImageGalleries');
}])->name('deleteImageGallery');


Route::get('/deleteImageGalleryPermanently/{imagegalleryID}', ['middleware'=>'dashboard_auth', function($imagegalleryID){

    $imagegallery = DB::select('select * from imageGallery where uniqueID = ? ',[$imagegalleryID]);
    DB::delete('delete from imageGallery where uniqueID = ?', [$imagegalleryID]);

    $imagesArr = explode(',',$imagegallery[0]->imagesName);
    foreach ($imagesArr as $currentFileName) {
        File::delete(public_path("img/imageGallery/").$currentFileName);
    }

    return redirect()->route('vDeletedImageGalleries');

}])->name('deleteImageGalleryPermanently');


Route::get('/restoreImageGallery/{imagegalleryID}', ['middleware'=>'dashboard_auth', function($imagegalleryID){

    DB::update('UPDATE imageGallery SET deletedAt = NULL WHERE uniqueID = ? ', [$imagegalleryID]);
    return redirect()->route('vDeletedImageGalleries');

}])->name('restoreImageGallery');
// ImageGallery Logic View routes : START
