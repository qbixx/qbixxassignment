<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\AppLanguage;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;

class ShowClient extends Controller
{
    public function __invoke(int $id)
    {
        $client = Client::with('items')->findOrFail($id);

        $languages = collect(AppLanguage::cases())
            ->map(function (AppLanguage $appLanguage) {
                return $appLanguage->name;
            });

        return view(
            'pages.front.clients.show',
            compact('client', 'languages'),
        );
    }
}
