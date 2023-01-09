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
        $client->name = $request->name;
        $client->save();

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS);
    }
}
