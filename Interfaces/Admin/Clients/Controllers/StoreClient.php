<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Illuminate\Http\RedirectResponse;
use Interfaces\Admin\Clients\Repositories\ClientRepository;
use Interfaces\Admin\Clients\Requests\StoreClientRequest;

class StoreClient extends Controller
{
    public function __invoke(StoreClientRequest $request): RedirectResponse
    {
        $client = Client::create($request->safe(['name']));
        ClientRepository::addOrUpdateItems($client);

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS);
    }
}
