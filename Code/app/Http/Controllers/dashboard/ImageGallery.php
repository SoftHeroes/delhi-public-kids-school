<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use File;

class ImageGallery extends Controller
{
    public function addImageGallery(Request $request){

        $files = $request->file('files'); // storing files in variable
        $name = trim($request->input('name'));

        $newFileNameArr = array();

        foreach ($files as $currentFileRef ) {
            if($currentFileRef->getError())
            {
                $error = ValidationException::withMessages(['Unable to upload files!']);
                throw $error;
            }
            $newName = uniqid() .".".$currentFileRef->getClientOriginalExtension();
            array_push($newFileNameArr, $newName);
        }

        $filesName = '';

        $fileCount = count($newFileNameArr);
        for ( $i=0 ; $i < $fileCount ; $i++) {

            $filesName = $filesName . $newFileNameArr[$i];
            if( $i != $fileCount - 1 ){
                $filesName = $filesName . ',';
            }
        }

        try {

            DB::insert('insert into imageGallery (name , imagesName) values ( ?, ?)', [ $name, $filesName]);

            $index = 0;

            foreach ($files as $currentFileRef) {
                $currentFileRef->move(public_path("img/imageGallery"), $newFileNameArr[$index]);
                $index++;
            }

            return redirect()->back()->with('message', 'Image Gallery added successfully.');

        } catch (Exception $e) {
            $error = ValidationException::withMessages([$e->getMessage()]);
            throw $error;
        }
    }
}
