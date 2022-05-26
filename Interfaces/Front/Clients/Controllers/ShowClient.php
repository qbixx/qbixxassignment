<?php

namespace Interfaces\Front\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Inertia\Inertia;
use Inertia\Response;

class ShowClient extends Controller
{
    public function __invoke(Client $client): Response
    {
        return Inertia::render('Front/Clients/Show', [
            'client' => $client->loadMissing('items'),
        ]);
    }
}
