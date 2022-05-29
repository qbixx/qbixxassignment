<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class UpdateLocale extends Controller
{
    public function __invoke($locale): RedirectResponse
    {
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
