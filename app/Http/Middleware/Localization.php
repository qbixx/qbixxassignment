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
        $locale = config('app.locale');

        if ($request->has('locale')) {
            $locale = $request->get('locale');
        } elseif (Session::has('locale')) {
            $locale = Session::get('locale');
        }

        if (! in_array($locale, config('app.available_locales'))) {
            $locale = config('app.locale');
        }

        Session::put('locale', $locale);
        App::setLocale($locale);

        return $next($request);
    }
}
