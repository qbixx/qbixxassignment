<?php

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Items\Models\Item;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Interfaces\Admin\Clients\Requests\ClientRequest;

class UpdateClient extends Controller
{
  public function __invoke(ClientRequest $request, $id): RedirectResponse
  {
    try {
      DB::beginTransaction();
      $client = Client::findOrFail($id);
      $client->update($request->all());
      // Remove client items
      $client->items()->delete();
      $itemsList = [];
      foreach ($request->items as $item) {
        $itemsList[] = new Item($item);
      }
      $client->items()->saveMany($itemsList);
      DB::commit();
      return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully!');
    } catch (ModelNotFoundException $exception) {
      return redirect()->back()->with('error', 'Model not found!');
    } catch (\Exception $exception) {
      DB::rollBack();
      return redirect()->back()->with('error', 'Internal Server Error. Please contact support team for further assistance');
    }
  }
}
