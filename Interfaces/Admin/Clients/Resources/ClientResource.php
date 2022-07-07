<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Resources;

use App\Exceptions\ClientItemsCountException;
use Domain\Items\Models\Item;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }

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
