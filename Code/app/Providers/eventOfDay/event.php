<?php

namespace App\Providers\eventOfDay;

use Illuminate\Support\ServiceProvider;
use Calendarific\Calendarific;

class event extends ServiceProvider
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

    public function getTodayEvent()
    {
        $response = array();
        $holidays = array();
        try {

            $day = (int)date('d');
            $month = (int)date('m');
            $year = (int)date("Y");

            $day = 27;
            $CIApi = new Calendarific();
            $response = $CIApi->make('dff9ab173306cb7801d933644adcb65322e0b062','IN',$year,$month,$day)['response'];

            if( array_key_exists('holidays',$response) && count($response['holidays']) > 0 ){
                foreach ($response['holidays'] as $currentHoliday) {
                    $holiday = (object) [
                        'name' => $currentHoliday['name'],
                        'description' => $currentHoliday['description']
                    ];
                    array_push($holidays, $holiday);
                }
            }

            return $holidays;

        } catch (\Throwable $th) {
            return $response;
        }
    }

}
