<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Illuminate\View\View;

class IndexClients extends Controller
{
    public function __invoke(): View
    {
        abort(404);
        $clients = Client::all();

        return view('pages.admin.clients.index', compact('clients'));
    }
}
