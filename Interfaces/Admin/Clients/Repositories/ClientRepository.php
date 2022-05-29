<?php
declare(strict_types=1);

namespace Interfaces\Admin\Clients\Repositories;

use Domain\ClientItem\Models\ClientItem;
use Domain\Clients\Models\Client;
use Illuminate\Database\Eloquent\Model;

class ClientRepository
{
    public static function addOrUpdateItems(Client $client, bool $create =  true, array $items = []){

        $defaultItems = $create ? config('default_client_items') : $items;
        $locales = config('app.available_locales');

        foreach ($defaultItems as $item){

            $clientItem = $create ? new ClientItem : ClientItem::find($item['id']);
            $clientItem->client_id = $client->id;
            $clientItem->type = $item['type'];

            foreach ($locales as $lang => $locale){
                $clientItem->setTranslation('title', $locale, $item['title'][$locale]);
                $clientItem->setTranslation('paragraph', $locale, $item['paragraph'][$locale]);
            }

            $clientItem->save();
        }

    }

}
