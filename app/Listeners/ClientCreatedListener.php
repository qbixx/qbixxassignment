<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\ClientCreated;
use Domain\Clients\Models\Item;
use Storage;

class ClientCreatedListener
{
    private const DEFAULT_ITEMS_FILE_NAME = 'default-items.json';

    public function handle(ClientCreated $event): void
    {
        $itemJson = json_decode(
            Storage::disk('local')->get(self::DEFAULT_ITEMS_FILE_NAME),
            true
        );

        $event->client->items()->saveMany(
            $this->mapItemData($itemJson['items'])
        );
    }

    private function mapItemData(array $itemsData): array
    {
        $result = [];

        array_walk($itemsData, function ($itemData) use (&$result): void {
            $temp = [];

            array_walk($itemData, function ($itemAttributes, $attribute) use (&$temp): void {
                $temp[$attribute] = $itemAttributes;
            });

            $result[] = new Item($temp);
        });

        return $result;
    }
}
