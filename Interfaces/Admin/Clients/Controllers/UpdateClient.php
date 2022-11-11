<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\Inertia\ClientView;
use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Items\Models\Item;
use Inertia\Inertia;
use Inertia\Response;
use Interfaces\Admin\Clients\Requests\UpdateClientRequest;

class UpdateClient extends Controller
{
    public function __invoke(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->safe(['name']));
        foreach ($request->itemsList as $key => $item){
            if(isset($client->items[$key])){
                $client->items[$key]->update($item);
            }else{
                $client->items()->create($item);
            }
        }

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS);
    }
}
