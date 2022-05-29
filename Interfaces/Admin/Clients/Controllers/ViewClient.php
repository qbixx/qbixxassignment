<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Inertia\Inertia;
use Inertia\Response;
use Interfaces\Admin\Clients\Repositories\ClientRepository;

class ViewClient extends Controller
{
    public function __invoke(Client $client): Response
    {
        if($client->items->isEmpty()){
            ClientRepository::addOrUpdateItems($client);
        }

        $items = $client->items;
        $currentLocale = session('locale', 'en');
        $locales = config('app.available_locales');

        $buttonTranslation = __("ButtonText", [], $currentLocale);

        return Inertia::render(
            'Admin/Clients/View',
            compact('client', 'items', 'currentLocale', 'locales', 'buttonTranslation')
        );
    }
}
