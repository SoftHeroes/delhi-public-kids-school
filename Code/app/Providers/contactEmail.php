<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Mail;

class contactEmail extends ServiceProvider
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

    public function contactUsMail($name,$emailID,$phoneNumber,$msg)
    {
        $to_name = 'Subham';
        $to_email = 'ShubhamJobanputra@gmail.com';
        $data = array('name' => $name,'emailID' => $emailID,'phoneNumber' => $phoneNumber,'msg' => $msg,);

        Mail::send('website.email.contact', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)->subject('Inquiry query Arrive');
        $message->from('Test@game.com','Delhi Kids School');
        });

        if (Mail::failures()) {
            return 'fail';
        }
        return 'OK';
    }
}
