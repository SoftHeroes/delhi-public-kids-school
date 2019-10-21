<?php

namespace App\Http\Middleware\dashboard;
require_once app_path() . '/Helpers/basic.php';

use Closure;

class Auth
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
                return $next($request);
            }
            else{
                return redirect()->route('vAdmin');
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
