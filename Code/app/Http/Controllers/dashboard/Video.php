<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use File;

class Video extends Controller
{
    public function addVideo(Request $request){

        $files = $request->file('files'); // storing files in variable
        $name = trim($request->input('name'));

        if(!is_null($files)){
            if($files[0]->getError()){
                $error = ValidationException::withMessages(['Unable to upload file!']);
                throw $error;
            }

            $newName = uniqid() .".".$files[0]->getClientOriginalExtension();

            $files[0]->move(public_path("img/videoGallery"), $newName);
        }

        try {

            DB::insert('insert into videoGallery (name , videoName) values ( ?, ?)', [ $name, $newName]);

            return redirect()->back()->with('message', 'Video added successfully.');

        } catch (Exception $e) {
            $error = ValidationException::withMessages([$e->getMessage()]);
            throw $error;
        }
    }
}
