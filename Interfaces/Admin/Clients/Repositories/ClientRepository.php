<?php
declare(strict_types=1);

namespace Interfaces\Admin\Clients\Repositories;

use Domain\ClientItem\Models\ClientItem;
use Illuminate\Database\Eloquent\Model;

class ClientRepository
{
    public static function addDefaultItems($client){

        $defaultItems = config('default_client_items');
        $locales = config('app.available_locales');

        foreach ($defaultItems as $item){

            $clientItem = new ClientItem;
            $clientItem->client_id = $client->id;
            $clientItem->type = $item['type'];

            foreach ($locales as $lang => $locale){
                $clientItem->setTranslation('title', $locale, $item[$locale]['title']);
                $clientItem->setTranslation('paragraph', $locale, $item[$locale]['paragraph']);
            }

            $clientItem->save();
        }

    }

}
