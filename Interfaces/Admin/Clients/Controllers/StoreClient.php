<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Clients\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Interfaces\Admin\Clients\Requests\StoreClientRequest;

class StoreClient extends Controller
{
    public function __invoke(StoreClientRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $languages = config('app.available_locales');
            $client = new Client;
            $client->name = $request->get('name');
            $client->save();

            foreach ($request->get('items') as $item) {
                $clientItem = new Item();
                $data = [
                    'client_id' => $client->id,
                    'item_type_id' => $item['type'],
                    'title' => [],
                    'paragraph' => [],
                ];
                foreach ($languages as $language) {
                    $data['title'][$language] = $item[$language]['title'];
                    $data['paragraph'][$language] = $item[$language]['paragraph'];
                }
                $clientItem->create($data);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with($exception->getMessage());
        }

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS);
    }
}
