<?php

namespace App\Http\Middleware\dashboard;
require_once app_path() . '/Helpers/basic.php';

use Closure;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $value = session(str_replace(".","_",$request->ip()).'DPKS');
            if( !isEmpty($value) && !isEmpty($value['user'])){
                return redirect()->route('vDashboard');
            }
            else{
                return $next($request);;
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
