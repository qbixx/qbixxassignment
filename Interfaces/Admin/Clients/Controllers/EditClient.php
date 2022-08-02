<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\ClientItem\Models\ClientItem;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Interfaces\Admin\Clients\Requests\UpdateClientRequest;

class EditClient extends Controller
{
    public function edit(Client $client): Response
    {
        $locales = config('app.language_locales');
        if ($client->items->isEmpty()) {
            $this->addOrUpdateItems($client);
        }

        $items = $client->fresh()->items;

        return Inertia::render(
            'Admin/Clients/Edit',
            compact('client', 'locales', 'items')
        );
    }

    public function update(UpdateClientRequest $request, Client $client): RedirectResponse
    {
        Client::find($client->id)->update(['name' => $request['name']]);
        $items = $request['items'];

        $this->addOrUpdateItems($client, false, $items);

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS);
    }

    public static function addOrUpdateItems(Client $client, bool $create = true, array $items = []): void
    {
        $defaultItems = $create ? config('default_client_items') : $items;
        $locales = config('app.language_locales');

        foreach ($defaultItems as $item) {
            $clientItem = $create ? new ClientItem : ClientItem::find($item['id']);
            $clientItem->client_id = $client->id;
            $clientItem->type = $item['type'];

            foreach ($locales as $lang => $locale) {
                $clientItem->setTranslation('title', $locale, $item['title'][$locale]);
                $clientItem->setTranslation('paragraph', $locale, $item['paragraph'][$locale]);
            }

            $clientItem->save();
        }
    }
}
