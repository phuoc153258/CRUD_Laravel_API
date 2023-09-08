<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $langs = ['en', 'vi'];
        if (in_array($request->header('X-localization'), $langs))
            App::setLocale($request->header('X-localization'));
        else App::setLocale($langs[0]);
        return $next($request);
    }
}
