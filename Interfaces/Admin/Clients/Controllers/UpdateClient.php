<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Interfaces\Admin\Clients\Requests\StoreClientRequest;

class UpdateClient extends Controller
{
    public function __invoke(Client $client, StoreClientRequest $request)
    {
        $safeData = $request->safe();
        $client->name = $safeData['name'];
        $client->save();

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS);
    }
}
