<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Illuminate\Http\RedirectResponse;

class UpdateLocale extends Controller
{
    public function __invoke($locale): RedirectResponse
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
