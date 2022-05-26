<?php

namespace Domain\Items\Repositories\Concerns;

use Domain\Clients\Models\Client;
use Domain\Items\Models\Item;

interface ItemRepositoryInterface
{
    public function update(Item $item, array $data): void;

    public function createDefaultItemsForClient(Client $client): void;
}
