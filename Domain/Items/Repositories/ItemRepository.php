<?php

namespace Domain\Items\Repositories;

use Domain\Clients\Models\Client;
use Domain\Items\Models\Item;
use Domain\Items\Repositories\Concerns\ItemRepositoryInterface;

class ItemRepository implements ItemRepositoryInterface
{
    public function update(Item $item, array $data): void
    {
        $item->update($data);
    }

    public function createDefaultItemsForClient(Client $client): void
    {
        $items = config('items.default');

        $client->items()->createMany($items);
    }
}
