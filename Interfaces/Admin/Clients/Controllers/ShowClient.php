<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Exceptions\ClientItemsCountException;
use App\Http\Controllers\Controller;
use App\Services\Translator;
use Domain\Clients\Models\Client;
use Domain\Items\Enums\ItemType;
use Domain\Items\Models\Item;
use Illuminate\Support\Arr;
use Inertia\Inertia;
use Inertia\Response;
use Interfaces\Admin\Clients\Resources\ShowItemResource;

class ShowClient extends Controller
{
    public function __invoke(Client $client): Response
    {
        $url = route(RoutesEnum::ADMIN_SHOW_CLIENT, ['client' => $client->id]);

        $items = $client->items;
        if (! $items->count()) {
            $items = ShowItemResource::collection([
                Item::factory()->makeDefault(ItemType::Wisdom, $client),
                Item::factory()->makeDefault(ItemType::Philosophy, $client),
                Item::factory()->makeDefault(ItemType::Design, $client),
            ]);
        }

        if ($items->count() !== 3) {
            throw new ClientItemsCountException();
        }

        $itemTypes = collect(ItemType::cases())->mapWithKeys(function (ItemType $itemType) {
            $config = $itemType->getConfig();
            Arr::set($config, 'image_url', asset(Arr::get($config, 'image_url')));

            return [
                $itemType->value => [
                    'config' => $config,
                    'translation' => $itemType->getTranslation(),
                ],
            ];
        });

        $translations = [
            'language' => Translator::getTranslation('qbixxassignment.language'),
            'just_a_button' => Translator::getTranslation('qbixxassignment.just_a_button'),
        ];

        return Inertia::render(
            'Admin/Clients/Show',
            compact(['url', 'client', 'items', 'itemTypes', 'translations'])
        );
    }
}
