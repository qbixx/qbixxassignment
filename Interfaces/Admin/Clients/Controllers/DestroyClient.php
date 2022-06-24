<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class DestroyClient extends Controller
{
    public function __invoke(Client $client): RedirectResponse
    {
        DB::transaction(function () use ($client): void {
            $client->delete();
        }, 3);

        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS);
    }
}
