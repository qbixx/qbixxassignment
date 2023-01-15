<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Interfaces\Admin\Clients\Requests\SetLocaleRequest;

class SetLocale extends Controller
{
    public function __invoke(SetLocaleRequest $request)
    {
        $safeData = $request->safe();

        if ($safeData['language']) {
            session(['locale' => $safeData['language']]);
        }

        return back();
    }
}
