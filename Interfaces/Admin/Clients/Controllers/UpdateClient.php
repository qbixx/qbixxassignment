<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Interfaces\Admin\Clients\Requests\UpdateClientRequest;

class UpdateClient extends Controller
{
    public function __invoke($id, UpdateClientRequest $request)
    {
        $client = Client::with('items')->findOrFail($id);

        $safeData = $request->safe();
        $client->name = $safeData['name'];

        foreach ($safeData['items'] as $itemId => $itemData) {
            $client->items()
                ->find($itemId)
                ->update($itemData);
        }

        $client->save();

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS);
    }
}
