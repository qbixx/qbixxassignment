<?php

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;

class DeleteClient extends Controller
{
  public function __invoke($id): RedirectResponse
  {
    try {
      Client::findOrFail($id)->delete();
      return redirect()->back()->with('success', 'Client deleted successfully!');
    } catch (ModelNotFoundException $exception) {
      return redirect()->back()->with('error', 'Model not found!');
    }
  }

}