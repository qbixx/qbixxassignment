<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;

class EditClient extends Controller
{
    public function __invoke($id)
    {
        $client = Client::with('items')->findOrFail($id);

        return view(
            'admin.clients.edit',
            compact('client')
        );
    }
}
