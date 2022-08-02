<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Inertia\Inertia;
use Inertia\Response;
use Interfaces\Admin\Clients\Controllers\EditClient;

class ViewClient extends Controller
{
    public function __invoke(Client $client): Response
    {
        if ($client->items->isEmpty()) {
            EditClient::addOrUpdateItems($client);
        }

        $items = $client->fresh()->items;
        $currentLocale = session('locale', 'en');
        $locales = config('app.language_locales');

        $buttonTranslation = __('ButtonText', [], $currentLocale);

        return Inertia::render(
            'Admin/Clients/View',
            compact('client', 'items', 'currentLocale', 'locales', 'buttonTranslation')
        );
    }
}
