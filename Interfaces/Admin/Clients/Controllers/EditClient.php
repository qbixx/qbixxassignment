<?php

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Inertia\Inertia;
use Interfaces\Admin\Clients\Requests\ClientRequest;

class EditClient extends Controller
{

  public function __invoke(ClientRequest $request, $id)
  {
    try {
      $client = Client::with('items')->findOrFail($id);
      return Inertia::render('Admin/Clients/Update', [
          'client' => $client
      ]);
    } catch (ModelNotFoundException $exception) {
      return redirect()->back()->with('error', 'Model not found!');
    }
  }
}