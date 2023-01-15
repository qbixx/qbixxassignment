<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        if (! session('locale')) {
            session(['locale' => 'en']);
        }

        app()->setLocale(session('locale'));

        return $next($request);
    }
}
