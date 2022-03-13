<?php

namespace Interfaces\Front\Clients;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Inertia\Inertia;

class ShowClient extends Controller
{
  public function __invoke($id) {
    try {
      $client = Client::with('items')->findOrFail($id);
      return Inertia::render('Front/Clients/Show', [
          'client'=> $client
      ]);
    } catch (ModelNotFoundException $exception) {
      return redirect()->back()->with('error', 'Model not found!');
    }
  }
}