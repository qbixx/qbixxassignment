<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Interfaces\Admin\Clients\Requests\StoreClientRequest;

class StoreClient extends Controller
{
    /**
     * @param StoreClientRequest $request
     * @return RedirectResponse
     */
    public function __invoke($locale, StoreClientRequest $request): RedirectResponse
    {
        $client = Client::create($request->safe(['name']));
        foreach ($request->input('items') as $item) {
            $data = [
                'type_id' => $item['type_id'],
            ];

            foreach ($item['translations'] as $key => $translation) {
                $data[$key] = $translation;
            }

            $client->items()->create($data);
        }
        session()->flash('message', 'Client record created successfully.');
        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS, $locale);
    }
}
