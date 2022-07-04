<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Exceptions\ClientItemsCountException;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Items\Enums\ItemType;
use Domain\Items\Models\Item;
use Inertia\Inertia;
use Inertia\Response;
use Interfaces\Admin\Clients\Resources\EditItemResource;

class EditClient extends Controller
{
    public function __invoke(Client $client): Response
    {
        $items = $client->items;
        if ($items->count() === 0) {
            $items = Item::factory()->makeDefaults($client);
        }

        $items = EditItemResource::collection($items);
        if ($items->count() !== 3) {
            throw new ClientItemsCountException();
        }

        $itemTypes = collect(ItemType::cases())->map(function (ItemType $itemType) {
            return [
                'value' => $itemType->value,
                'translations' => $itemType->getTranslations(),
            ];
        });

        return Inertia::render(
            'Admin/Clients/Edit',
            compact(['client', 'items', 'itemTypes']),
        );
    }
}
