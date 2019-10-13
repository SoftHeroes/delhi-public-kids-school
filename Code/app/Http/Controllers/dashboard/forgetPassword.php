<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\PasswordRecovery;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

require_once app_path() . '/Helpers/basic.php';

class forgetPassword extends Controller
{
    private $passwordRecoveryProvider;

    public function sendOTP(Request $request){

        if( isEmpty($request->input("emailID")) )
        {
            $error = ValidationException::withMessages(['Email Id Cannot be empty.']);
            throw $error;
        }
        $emailID = trim($request->input("emailID"));

        $row = DB::select('select 1 from userinformation where emailID = ?', [$emailID]);

        if(count($row) == 0 ){
            $error = ValidationException::withMessages(['Email Id not found to belong to any user.']);
            throw $error;
        }

        $this->passwordRecoveryProvider = new PasswordRecovery($request);

        $OTP = mt_rand(100000, 999999);
        $mailSentResponse = $this->passwordRecoveryProvider->passwordRecoveryMail($OTP);

        if( $mailSentResponse == 'OK')
        {

            $otpSaveResponse =  DB::select("call USP_userOTPLogger('" . $emailID . "','" . $OTP . "');");

            if ($otpSaveResponse[0]->ErrorFound == "YES") {
                $error = ValidationException::withMessages(['Unable to send sms']);
                throw $error;
            }
            else{
                return redirect()->route(
                    'vForgetPassword',
                    [
                        'emailID' => $request->input('emailID'),
                        'source' => $request->input('source'),
                        'language' => $request->input('language')
                    ]
                );
            }
        }
        else{
            $error = ValidationException::withMessages(['Unable to send OTP.']);
            throw $error;
        }
    }

    public function resetPassword(Request $request)
    {
        // USP_userPasswordReset
        $emailID         = 'NULL';
        $otp             = 'NULL';
        $newPassword     = 'NULL';
        $confirmPassword = 'NULL';
        $source          = 'NULL';
        $language        = 'NULL';

        if (!isEmpty($request->input("emailID"))) {
            $emailID = "'" . trim($request->input("emailID")) . "'";
        }
        if (!isEmpty($request->input("otp"))) {
            $otp = "'" . trim($request->input("otp")) . "'";
        }
        if (!isEmpty($request->input("newPassword"))) {
            $newPassword = "'" . trim($request->input("newPassword")) . "'";
        }
        if (!isEmpty($request->input("confirmPassword"))) {
            $confirmPassword = "'" . trim($request->input("confirmPassword")) . "'";
        }
        if (!isEmpty($request->input("source"))) {
            $source = "'" . trim($request->input("source")) . "'";
        }
        if (!isEmpty($request->input("language"))) {
            $language = "'" . trim($request->input("language")) . "'";
        }

        $response =  DB::select("call USP_userPasswordReset(" . $emailID . "," . $otp . "," . $newPassword . "," . $confirmPassword . "," . $source . "," . $language . ");");
        if ($response[0]->ErrorFound == "NO") {
            return redirect()->route('vAdmin')->with('message', $response[0]->Message);
        } else {
            $error = ValidationException::withMessages([$response[0]->Message]);
            throw $error;
        }
        $error = ValidationException::withMessages(['Unable to reset password']);
        throw $error;
    }
}
