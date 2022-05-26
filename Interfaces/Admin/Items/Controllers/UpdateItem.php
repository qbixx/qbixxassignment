<?php

namespace Interfaces\Admin\Items\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Items\Models\Item;
use Domain\Items\Repositories\Concerns\ItemRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Interfaces\Admin\Items\Requests\UpdateItemRequest;

class UpdateItem extends Controller
{
    public function __construct(
        protected ItemRepositoryInterface $itemRepository
    )
    {
    }

    public function __invoke(UpdateItemRequest $request, Client $client, Item $item): RedirectResponse
    {
        $this->itemRepository->update($item, $request->validated());

        return redirect()->route(RoutesEnum::ADMIN_EDIT_CLIENT, $client);
    }
}
