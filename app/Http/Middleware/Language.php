<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $translatable_locales = array_keys(config('translatable.locales'));
        $route = $request->route();

        if (request('change_language')) {
            // var_dump("request('change_language')");
            // exit;
            session()->put('locale', request('change_language'));
            $locale = request('change_language');

            if (array_key_exists('locale', $route->parameters) && $route->parameters['locale'] != $locale) {
                $route->parameters['locale'] = $locale;

                if (in_array($locale, $translatable_locales)) {
                    app()->setLocale($locale);
                    session()->put('locale', $locale);
                }

                return redirect(route($route->getName(), $route->parameters));
            }
        } elseif (session('locale')) {
            // var_dump(session('locale'));
            // exit;
            $locale = session('locale');

            if (array_key_exists('locale', $route->parameters) && $route->parameters['locale'] != $locale && in_array($route->parameters['locale'], $translatable_locales)) {
                $locale = $route->parameters['locale'];
                app()->setLocale($locale);
                session()->put('locale', $locale);
            }
        } elseif (config('translatable.locale')) {
            // var_dump(config('translatable.locale'));
            // exit;
            $locale = config('translatable.locale');
            app()->setLocale($locale);
            session()->put('locale', $locale);
        } else{
            $locale = $route->parameters['locale'];
            if (isset($locale) && in_array($locale, $translatable_locales)) {
                app()->setLocale($locale);
            }
        }


        return $next($request);
    }
}
