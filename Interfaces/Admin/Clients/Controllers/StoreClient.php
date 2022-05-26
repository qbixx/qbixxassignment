<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Clients\Repositories\Concerns\ClientRepositoryInterface;
use Domain\Items\Repositories\Concerns\ItemRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Interfaces\Admin\Clients\Requests\StoreClientRequest;

class StoreClient extends Controller
{
    public function __construct(
        protected ClientRepositoryInterface $clientRepository,
        protected ItemRepositoryInterface $itemRepository,
    )
    {
    }

    public function __invoke(StoreClientRequest $request): RedirectResponse
    {
        $client = $this->clientRepository->create($request->validated());

        $this->itemRepository->createDefaultItemsForClient($client);

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS);
    }
}
