<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Clients\Models\Item;
use Domain\Clients\Models\ItemType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Interfaces\Admin\Clients\Requests\UpdateClientRequest;

class UpdateClient extends Controller
{
    public function __invoke(Client $client, UpdateClientRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $languages = config('app.available_locales');
            $client->name = $request->name;
            $client->save();

            if(count($client->items)) {
                $hasItems = true;
            } else {
                $hasItems = false;
            }
            foreach ($request->get('items') as $item) {
                if($hasItems) {
                    $clientItem = Item::findOrFail($item['id']);
                } else {
                    $clientItem = new Item();
                }
                $type = ItemType::findOrFail($item['type']);
                $data = [
                    'client_id' => $client->id,
                    'item_type_id' => $type->id,
                    'title' => [],
                    'paragraph' => []
                ];
                foreach ($languages as $language) {
                    $data['title'][$language] = $item[$language]['title'];
                    $data['paragraph'][$language] = $item[$language]['paragraph'];
                }
                if($hasItems) {
                    $clientItem->update($data);
                } else {
                    $clientItem->create($data);
                }
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with($exception->getMessage());
        }

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS);
    }
}
