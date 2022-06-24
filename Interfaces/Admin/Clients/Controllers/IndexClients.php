<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Inertia\Inertia;
use Inertia\Response;
use Interfaces\Admin\Clients\Resources\IndexClientResource;

class IndexClients extends Controller
{
    public function __invoke(): Response
    {
        $clients = IndexClientResource::collection(Client::all());

        return Inertia::render(
            'Admin/Clients/Index',
            compact('clients'),
        );
    }
}
