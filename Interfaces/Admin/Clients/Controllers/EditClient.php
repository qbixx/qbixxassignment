<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Enums\ItemType;
use Domain\Clients\Models\Client;
use Illuminate\View\View;

class EditClient extends Controller
{
    public function __invoke(int $id): View
    {
        $client = Client::with('items')->findOrFail($id);
        $itemTypes = ItemType::cases();

        return view(
            'admin.clients.edit',
            compact('client', 'itemTypes')
        );
    }
}
