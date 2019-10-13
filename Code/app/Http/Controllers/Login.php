<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

require_once app_path() . '/Helpers/basic.php';

class Login extends Controller
{
    public function userLogin(Request $request)
    {
        $username   = 'NULL';
        $password   = 'NULL';
        $source     = 'NULL';
        $language   = 'NULL';
        if (!isEmpty($request->input("username"))) {
            $username = "'" . trim($request->input("username")) . "'";
        }
        if (!isEmpty($request->input("password"))) {
            $password = "'" . trim($request->input("password")) . "'";
        }
        if (!isEmpty($request->input("source"))) {
            $source = "'" . trim($request->input("source")) . "'";
        }
        if (!isEmpty($request->input("language"))) {
            $language = "'" . trim($request->input("language")) . "'";
        }
        $response =  DB::select("call USP_userLogin(" . $username . "," . $password . "," . $source . "," . $language . ");");

        $ErrorFound = 'NULL';
        if (!isEmpty($response[0]->ErrorFound)) {
            $ErrorFound = trim($response[0]->ErrorFound);
        }
        DB::select("call USP_markLogin(" . $username . ",'" . $ErrorFound . "');");
        if ($ErrorFound == "NO") {

            $request->session()->put([ $request->ip().'DPKS' => ['user' => $response[0]->Username ]]); // creating login session

            return redirect()->route('vDashboard');
        } else {
            $error = ValidationException::withMessages([$response[0]->Message]);
            throw $error;
        }
    }

    public function userLogout(Request $request){
        $request->session()->forget($request->ip().'DPKS'); // removing user session
        return redirect()->route('vAdmin');
    }
}
