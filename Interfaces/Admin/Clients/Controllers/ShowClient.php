<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\AppLanguage;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;

class ShowClient extends Controller
{
    public function __invoke($language, $id)
    {
        $client = Client::with('items')->findOrFail($id);

        if (! AppLanguage::tryFrom($language)) {
            return abort(404);
        }

        app()->setLocale($language);

        return view(
            'pages.front.clients.show',
            compact('client')
        );
    }
}
