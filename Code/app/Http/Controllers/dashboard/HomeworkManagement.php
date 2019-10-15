<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use File;

class HomeworkManagement extends Controller
{
    public function addHomework(Request $request){

        $files = $request->file('files'); // storing files in variable
        $homeworkClass = trim($request->input('homeworkClass'));
        $homeworkDescription = trim($request->input('homeworkDescription'));
        $HomeworkDate = date("Y-m-d H:i:s", strtotime(trim($request->input('homeworkDate'))));

        $newName = null;
        if(!is_null($files)){
            if($files[0]->getError()){
                $error = ValidationException::withMessages(['Unable to upload file!']);
                throw $error;
            }

            $newName = uniqid() .".".$files[0]->getClientOriginalExtension();

            $files[0]->move(public_path("img/homework"), $newName);
        }

        DB::beginTransaction();
        try {

            DB::insert('insert into homeworks (class , text, dateOfHomework, imageName) values ( ?, ?, ?, ?)', [ $homeworkClass, $homeworkDescription, $HomeworkDate,$newName]);

            DB::commit();

            return redirect()->back()->with('message', 'homework added successfully.');

        } catch (Exception $e) {
            DB::rollback();
            $error = ValidationException::withMessages([$e->getMessage()]);
            throw $error;
        }
    }
}
