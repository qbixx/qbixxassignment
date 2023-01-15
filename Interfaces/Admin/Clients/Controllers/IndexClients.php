<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use Domain\Clients\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class IndexClients extends Controller
{
    public function __invoke(Request $request): Response
    {
        $clients = ClientResource::collectResources(Client::all());

        return Inertia::render(
            'Admin/Clients/Index',
            compact('clients'),
        );
    }
}
