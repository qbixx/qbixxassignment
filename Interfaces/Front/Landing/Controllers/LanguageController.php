<?php

declare(strict_types=1);

namespace Interfaces\Front\Landing\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Interfaces\Front\Landing\Requests\LanguageRequest;

class LanguageController extends Controller
{
    public function __invoke(LanguageRequest $request): RedirectResponse
    {
        $locale = $request->get('locale');

        Session::put('locale', $locale);
        App::setLocale($locale);

        return Redirect::back();
    }
}
