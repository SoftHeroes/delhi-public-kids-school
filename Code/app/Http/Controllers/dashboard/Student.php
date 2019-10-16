<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use File;

class Student extends Controller
{
    public function addStudent(Request $request){

        $files = $request->file('files'); // storing files in variable

        $fname = trim($request->input('fname'));
        $lname = trim($request->input('lname'));
        $studenDOB = (string)date("Y-m-d", strtotime(str_replace('/', '-', trim($request->input('StudentDate')))));

        if($files[0]->getError()){
            $error = ValidationException::withMessages(['Unable to upload file!']);
            throw $error;
        }
        $newName = uniqid() .".".$files[0]->getClientOriginalExtension();

        DB::beginTransaction();
        try {

            $files[0]->move(public_path("img/student"), $newName);

            DB::insert('insert into students ( fname, lname, dateOfBirth, imageName) values (?, ?, ?, ?)', [$fname, $lname, $studenDOB, $newName]);

            DB::commit();

            return redirect()->back()->with('message', 'Student added successfully.');

        } catch (Exception $e) {
            DB::rollback();
            $error = ValidationException::withMessages([$e->getMessage()]);
            throw $error;
        }
    }
}
