<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Translator;
use Domain\Clients\Models\Client;
use Domain\Items\Enums\ItemType;
use Illuminate\Support\Arr;
use Inertia\Inertia;
use Inertia\Response;
use Interfaces\Admin\Clients\Resources\ShowClientResource;

class ShowClient extends Controller
{
    public function __invoke(Client $client): Response
    {
        $client = ShowClientResource::make($client);

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
            compact(['client', 'itemTypes', 'translations'])
        );
    }
}
