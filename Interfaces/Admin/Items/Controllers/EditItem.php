<?php

namespace Interfaces\Admin\Items\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Items\Models\Item;
use Inertia\Inertia;
use Inertia\Response;

class EditItem extends Controller
{
    public function __invoke(Client $client, Item $item): Response
    {
        return Inertia::render('Admin/Items/Edit', [
            'item' => $item,
            'client' => $client,
        ]);
    }
}
