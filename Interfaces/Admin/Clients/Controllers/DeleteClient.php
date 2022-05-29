<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Illuminate\Http\RedirectResponse;

class DeleteClient extends Controller
{
    public function __invoke(Client $client): RedirectResponse
    {
        $client->delete();
        return redirect()->back();
    }
}
