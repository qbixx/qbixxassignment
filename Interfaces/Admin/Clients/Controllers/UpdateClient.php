<?php

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Clients\Repositories\Concerns\ClientRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Interfaces\Admin\Clients\Requests\UpdateClientRequest;

class UpdateClient extends Controller
{
    public function __construct(protected ClientRepositoryInterface $clientRepository)
    {
    }

    public function __invoke(UpdateClientRequest $request, Client $client): RedirectResponse
    {
        $this->clientRepository->update($client, $request->validated());

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS);
    }
}
