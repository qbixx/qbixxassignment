<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Items\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Interfaces\Admin\Clients\Requests\ClientRequest;

class StoreClient extends Controller
{
  public function __invoke(ClientRequest $request): RedirectResponse
  {
    try {
      DB::beginTransaction();
      $client = Client::create($request->all());
      $itemsList = [];
      foreach ($request->items as $item) {
        $itemsList[] = new Item($item);
      }
      $client->items()->saveMany($itemsList);
      DB::commit();
      return redirect()->route('admin.clients.index')->with('success', 'Client created successfully!');
    } catch (\Exception $exception) {
      DB::rollBack();
      return redirect()->back()->with('error', 'Internal Server Error. Please contact support team for further assistance');
    }

  }
}
