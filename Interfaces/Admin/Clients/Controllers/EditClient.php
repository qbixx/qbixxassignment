<?php

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Inertia\Inertia;
use Inertia\Response;

class EditClient extends Controller
{
    public function __invoke(Client $client): Response
    {
        return Inertia::render('Admin/Clients/Edit', [
            'client' => $client->loadMissing('items'),
        ]);
    }
}
