<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Clients\Models\Item;
use Domain\Clients\Models\ItemType;
use Inertia\Inertia;
use Inertia\Response;

class EditClient extends Controller
{
    public function __invoke(Client $client): Response
    {
        $clientItems = [];
        if(!count($client->items)) {
            $myItems = Item::where('client_id', null)->get();
        } else {
            $myItems = $client->items;
        }

        foreach ($myItems as $key => $myItem) {
            foreach (config('app.available_locales') as $lang) {
                $clientItems[$key]['title'][$lang] = $myItem->getTranslation('title', $lang);
                $clientItems[$key]['paragraph'][$lang] = $myItem->getTranslation('paragraph', $lang);
            }
            $clientItems[$key]['type'] = $myItem->item_type_id;
            $clientItems[$key]['id'] = $myItem->id;
        }
        $types = [];
        foreach (ItemType::all() as $type) {
            foreach (config('app.available_locales') as $lang) {
                $types[$lang][$type->id] = $type->getTranslation('name', $lang);
            }
        }
        return Inertia::render('Admin/Clients/Edit', compact('client', 'types', 'clientItems'));
    }
}
