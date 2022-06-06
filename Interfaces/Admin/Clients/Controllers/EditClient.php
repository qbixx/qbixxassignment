<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Domain\Clients\Models\Type;
use Domain\Clients\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class EditClient extends Controller
{
    /**
     * @param Client $client
     * @return RedirectResponse|Response
     */
    public function __invoke($locale, Client $client)
    {
        if (!isset($client)) {
            return back()->with('error', 'Client record does not exist.');
        }

        $client->load('items.type');
        $itemTypes = Type::all();
        return Inertia::render(
            'Admin/Clients/Edit',
            compact('client', 'itemTypes'),
        );
    }
}
