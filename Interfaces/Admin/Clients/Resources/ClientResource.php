<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Resources;

use App\Exceptions\ClientItemsCountException;
use Domain\Items\Models\Item;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

abstract class ClientResource extends JsonResource
{
    protected function getItems(): Collection
    {
        $itemsCount = $this->items->count();

        if ($itemsCount === 0) {
            return Item::factory()->makeDefaults($this->resource);
        }

        if ($itemsCount === 3) {
            return $this->items;
        }

        throw new ClientItemsCountException();
    }
}
