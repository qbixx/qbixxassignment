<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\ClientCreated;
use Domain\Clients\Models\Client;
use Domain\Clients\Models\Item;
use Illuminate\Support\Collection;
use Storage;

class ClientCreatedListener
{
    public function handle(ClientCreated $event): void
    {
        $client = Client::with('items')->findOrFail($event->id);

        $itemJson = json_decode(
            Storage::disk(
                config('qbixx.default_items.storage')
            )->get(
                config('qbixx.default_items.path')
            ),
            true
        );

        $client->items()->saveMany(
            $this->mapItemData($itemJson['items'])
        );
    }

    private function mapItemData(array $itemsData): Collection
    {
        return collect($itemsData)->map(function (array $item) {
            return new Item($item);
        });
    }
}
