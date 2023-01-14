<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Inertia\Inertia;
use Inertia\Response;
use URL;

class IndexClients extends Controller
{
    public function __invoke(): Response
    {
        $clients = Client::all()
            ->map(function ($client) {
                $client->editUrl = URL::route(RoutesEnum::ADMIN_EDIT_CLIENT, $client);
                $client->deleteUrl = URL::route(RoutesEnum::ADMIN_DELETE_CLIENT, $client);
                $client->showUrl = URL::route(RoutesEnum::FRONT_SHOW_CLIENT, ['en', $client]);

                return $client;
            });

        return Inertia::render(
            'Admin/Clients/Index',
            compact('clients'),
        );
    }
}
