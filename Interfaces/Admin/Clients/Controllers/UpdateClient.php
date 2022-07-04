<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Interfaces\Admin\Clients\Requests\UpdateClientRequest;

class UpdateClient extends Controller
{
    public function __invoke(Client $client, UpdateClientRequest $request): RedirectResponse
    {
        DB::transaction(
            function () use ($client, $request): void {
                $client->update($request->safe(['name']));

                $items = $request->validated('items');
                foreach ($items as $item) {
                    $client
                        ->items()
                        ->updateOrCreate(
                            [
                                'id' => Arr::get($item, 'id'),
                            ],
                            $item
                        );
                }
            },
            3
        );

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS);
    }
}
