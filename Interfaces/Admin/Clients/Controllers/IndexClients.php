<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\Inertia\ClientView;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Inertia\Inertia;
use Inertia\Response;

class IndexClients extends Controller
{
    public function __invoke(): Response
    {
        $clients = Client::all();

        return Inertia::render(
            ClientView::ADMIN_INDEX,
            compact('clients'),
        );
    }
}
