<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Inertia\Inertia;
use Inertia\Response;

class ViewClient extends Controller
{
    public function __invoke(Client $client): Response
    {
        $items = $client->items;
        $currentLocale = session('locale') ?? 'en';
        $locales = config('app.available_locales');

        return Inertia::render(
            'Admin/Clients/View',
            compact('client', 'items', 'currentLocale', 'locales')
        );
    }
}
