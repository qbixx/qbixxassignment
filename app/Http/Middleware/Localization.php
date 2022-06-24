<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }

        if ($request->has('locale')) {
            $locale = $request->get('locale');
            App::setLocale($locale);
            Session::put('locale', $locale);
        }

        return $next($request);
    }
}
