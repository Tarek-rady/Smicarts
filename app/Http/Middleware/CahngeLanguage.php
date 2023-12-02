<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CahngeLanguage
{


    public function handle(Request $request, Closure $next)
    {
        app()->setlocale('ar');

        if( $request->hasHeader('Accept-Language')  && $request->header('Accept-Language') == 'en' ){
            app()->setlocale('en');
        }

        return $next($request);

    }
}
