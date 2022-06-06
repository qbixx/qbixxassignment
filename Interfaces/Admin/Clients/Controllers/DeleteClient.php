<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\RoutesEnum;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Illuminate\Http\RedirectResponse;

class DeleteClient extends Controller
{
    /**
     * @param Client $client
     * @return RedirectResponse
     */
    public function __invoke($locale, Client $client)
    {
        if (!isset($client)) {
            return back()->with('error', 'Client record does not exist.');
        }
        $client->delete();
        session()->flash('message', 'Client record deleted successfully.');
        return redirect()->route(RoutesEnum::ADMIN_INDEX_CLIENTS, $locale);
    }

}
