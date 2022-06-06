<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\ClientItem;
use Illuminate\Http\RedirectResponse;
use Interfaces\Admin\Clients\Requests\StoreClientRequest;

class UpdateClient extends Controller
{
    /**
     * @param StoreClientRequest $request
     * @param Client $client
     * @return RedirectResponse
     */
    public function __invoke($locale, StoreClientRequest $request, Client $client): RedirectResponse
    {
        if (!isset($client)) {
            return back()->with('error', 'Client record does not exist.');
        }

        $client->name = $request->input('name');
        $client->save();

        foreach ($request->input('items') as $item) {
            ClientItem::query()->where('id', $item['id'])->update([
                'title' => $item['title'],
                'paragraph' => $item['paragraph']
            ]);
        }

        session()->flash('message', 'Client record updated successfully.');

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS, $locale);
    }

}
