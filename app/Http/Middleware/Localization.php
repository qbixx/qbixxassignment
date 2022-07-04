<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Enums\LocaleEnum;
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
            $locale = LocaleEnum::tryFrom(Session::get('locale')) ?? LocaleEnum::default();

            App::setLocale($locale->value);
        }

        return $next($request);
    }
}
