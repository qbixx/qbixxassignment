<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Interfaces\Admin\Clients\Repositories\ClientRepository;

class EditClient extends Controller
{
    public function edit(Client $client): Response
    {
        $locales = config('app.available_locales');
        if($client->items->isEmpty()){
            ClientRepository::addDefaultItems($client);
        }
        return Inertia::render(
            'Admin/Clients/Edit',
            compact('client', 'locales')
        );
    }
}
