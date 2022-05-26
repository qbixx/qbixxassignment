<?php

namespace Interfaces\Base\Locale\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class UpdateLocale extends Controller
{
    public function __invoke(string $locale): RedirectResponse
    {
        if (!in_array($locale, config('app.locales'))) {
            session()->put('locale', config('app.fallback_locale'));

            return redirect()->back();
        }

        session()->put('locale', $locale);

        return redirect()->back();
    }
}
