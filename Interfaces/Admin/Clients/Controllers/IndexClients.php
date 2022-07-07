<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Inertia\Inertia;
use Inertia\Response;
use Interfaces\Admin\Clients\Resources\ClientResource;

class IndexClients extends Controller
{
    public function __invoke(): Response
    {
        $clients = ClientResource::collection(Client::without('items')->get());

        return Inertia::render(
            'Admin/Clients/Index',
            compact('clients'),
        );
    }
}
