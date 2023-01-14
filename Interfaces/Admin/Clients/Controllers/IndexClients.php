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
            ->map(function ($user) {
                $user->editUrl = URL::route(RoutesEnum::ADMIN_EDIT_CLIENT, $user);
                $user->deleteUrl = URL::route(RoutesEnum::ADMIN_DELETE_CLIENT, $user);

                return $user;
            });

        return Inertia::render(
            'Admin/Clients/Index',
            compact('clients'),
        );
    }
}
