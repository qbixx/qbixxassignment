<?php

declare(strict_types=1);

namespace Interfaces\Front\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Clients\Models\Item;
use Inertia\Inertia;
use Inertia\Response;

class ShowClient extends Controller
{
    public function __invoke(Client $client): Response
    {
        if(!count($client->items)) {
            $myItems = Item::with('itemType')->where('client_id', null)->get();
        } else {
            $myItems = $client->items()->with('itemType')->get();
        }

        return Inertia::render('Front/Clients/Show', compact('client', 'myItems'));
    }
}
