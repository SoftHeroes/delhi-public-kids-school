<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PrincipalMessage extends Controller
{
    public function addPrincipalMessage(Request $request){

        $title = trim($request->input('title'));
        $subtitle = html_entity_decode(trim($request->input('subtitle')));

        try {
            DB::insert('insert into principalMessages (title, subtitle) values (?, ?)', [$title, $subtitle]);

            return redirect()->back()->with('message', 'Messages added successfully.');

        } catch (\Throwable $th) {
            $error = ValidationException::withMessages(['Invalid Exception.']);
            throw $error;
        }
    }
}
