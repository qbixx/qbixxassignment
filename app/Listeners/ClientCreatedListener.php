<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\ClientCreated;
use Domain\Clients\Models\Item;
use Storage;

class ClientCreatedListener
{
    private const DEFAULT_ITEMS_FILE_NAME = 'default-items.json';

    public function handle(ClientCreated $event)
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

        array_walk($itemsData, function ($itemData) use (&$result) {
            array_walk($itemData, function ($item, $itemLanguage) use (&$result) {
                $result[] = new Item(
                    [
                        'language' => $itemLanguage,
                        'title' => $item['title'],
                        'paragraph' => $item['paragraph'],
                        'type' => $item['type'],
                    ]
                );
            });
        });

        return $result;
    }
}
