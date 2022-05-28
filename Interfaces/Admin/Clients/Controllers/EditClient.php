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
use Interfaces\Admin\Clients\Requests\UpdateClientRequest;

class EditClient extends Controller
{
    public function edit(Client $client): Response
    {
        $locales = config('app.available_locales');
        if($client->items->isEmpty()){
            ClientRepository::addItems($client);
        }

        $items = $client->fresh()->items;
        return Inertia::render(
            'Admin/Clients/Edit',
            compact('client', 'locales', 'items')
        );
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $locales = config('app.available_locales');

        Client::find($client->id)->update(['name' => $request['name']]);
        $items = $request['items'];

        ClientRepository::addItems($client, false, $items);

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS);
    }
}
