<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Mail;

class PasswordRecovery extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function passwordRecoveryMail($OTP)
    {
        $to_name = 'Subham';
        $to_email = 'ShubhamJobanputra@gmail.com';
        $data = array('OTP'=>$OTP,);

        Mail::send('email.passwordRecovery', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)->subject('Password recovery');
        $message->from('Test@game.com','Delhi Kids School');
        });

        if (Mail::failures()) {
            return 'fail';
        }
        return 'OK';
    }
}
