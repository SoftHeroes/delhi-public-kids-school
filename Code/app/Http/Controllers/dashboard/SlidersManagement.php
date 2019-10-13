<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use File;

class SlidersManagement extends Controller
{
    public function createSlider(Request $request){

        $files = $request->file('files'); // storing files in variable

        $title = trim($request->input('title'));

        if($files[0]->getError()){
            $error = ValidationException::withMessages(['Unable to upload file!']);
            throw $error;
        }
        $newName = uniqid() .".".$files[0]->getClientOriginalExtension();

        DB::beginTransaction();
        try {

            $files[0]->move(public_path("img/sliders"), $newName);

            DB::insert('insert into sliders (title, imageName) values (?, ?)', [$title, $newName]);

            DB::commit();

            return redirect()->back()->with('message', 'Slider create successfully.');

        } catch (Exception $e) {
            DB::rollback();
            $error = ValidationException::withMessages([$e->getMessage()]);
            throw $error;
        }
    }

    public function updateSlider(Request $request){

        // Variable block : START
        $files = $request->file('files'); // storing files in variable

        $title = trim($request->input('title'));

        $uniqueID = (int)trim($request->input('uniqueID'));
        $newName = '';

        // Variable block : END

        $resultSet = DB::select('select * from sliders where uniqueID = ?', [$uniqueID]);

        if( count($resultSet) == 0 ){
            $error = ValidationException::withMessages(['invalid slider ID!']);
            throw $error;
        }

        // File update Block : START
        if(!is_null($files)){
            if($files[0]->getError()){
                $error = ValidationException::withMessages(['Unable to edit file!']);
                throw $error;
            }

            $newName = uniqid() .".".$files[0]->getClientOriginalExtension();

            $files[0]->move(public_path("img/sliders"), $newName);
        }
        // File update Block : END

        try {
            // title Update block : START

            DB::beginTransaction();

            DB::update('update sliders set title = ?,imageName = stringIfNull(?,imageName) where uniqueID = ?', [$title, $newName,$uniqueID]);

            DB::commit();

            if(!is_null($files)){
                File::delete(public_path("img/sliders/").$resultSet[0]->imageName);
            }

            // title Update block : START
            return redirect()->route('vViewSlider',['sliderID' => $uniqueID ])->with('message', 'Slider updated successfully.'); // load previous page

        } catch (Exception $e) {
            DB::rollback();
            $error = ValidationException::withMessages([$e->getMessage()]);
            throw $error;
        }
    }
}
