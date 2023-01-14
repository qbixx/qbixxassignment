<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Enums\ItemType;
use Domain\Clients\Models\Client;

class EditClient extends Controller
{
    public function __invoke(int $id)
    {
        $client = Client::with('items')->findOrFail($id);
        $itemTypes = ItemType::cases();

        return view(
            'admin.clients.edit',
            compact('client', 'itemTypes')
        );
    }
}
