<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Items\Enums\ItemType;
use Inertia\Inertia;
use Inertia\Response;
use Interfaces\Admin\Clients\Resources\EditClientResource;

class EditClient extends Controller
{
    public function __invoke(Client $client): Response
    {
        $client = EditClientResource::make($client);

        $itemTypes = collect(ItemType::cases())->map(function (ItemType $itemType) {
            return [
                'value' => $itemType->value,
                'translations' => $itemType->getTranslations(),
            ];
        });

        return Inertia::render(
            'Admin/Clients/Edit',
            compact(['client', 'itemTypes']),
        );
    }
}
