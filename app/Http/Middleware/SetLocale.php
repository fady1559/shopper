<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session; // Ensure this line is added

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Get the locale from the session, or use the default from config
        $locale = Session::get('locale', config('app.locale'));
        App::setLocale($locale);

        return $next($request);
    }
}
