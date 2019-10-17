<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\contactEmail;
use Illuminate\Validation\ValidationException;

require_once app_path() . '/Helpers/basic.php';

class ContactUsMailer extends Controller
{
    private $contactEmailProvider;

    public function sendContactMail(Request $request){

        $name = trim($request->input("name"));
        $emailID = trim($request->input("emailID"));
        $phoneNumber = trim($request->input("phoneNumber"));
        $msg = trim($request->input("msg"));

        $this->contactEmailProvider = new contactEmail($request);
        $mailSentResponse = $this->contactEmailProvider->contactUsMail($name,$emailID,$phoneNumber,$msg);

        if( $mailSentResponse == 'OK')
        {
            return redirect()->back()->with('message', 'Inquiry sent successfully.');
        }
        else{
            $error = ValidationException::withMessages(['Unable to send contact Email.']);
            throw $error;
        }
    }
}
