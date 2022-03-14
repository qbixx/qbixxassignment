<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Inertia\Inertia;
use Inertia\Response;

class IndexClients extends Controller
{
    public function __invoke(): Response
    {
        $clients = Client::with('items')->get();

        return Inertia::render('Admin/Clients/Index', compact('clients'));
    }
}
