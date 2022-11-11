<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Enums\Inertia\ClientView;
use App\Http\Controllers\Controller;
use Domain\Clients\Models\Client;
use Domain\Languages\Models\Language;
use Domain\Types\Models\Type;
use Inertia\Inertia;
use Inertia\Response;

class ShowClient extends Controller
{
    public function __invoke(Client $client): Response
    {
        $items = $client->items;
        return Inertia::render(
            ClientView::ADMIN_SHOW,
            compact(['client','items']),
        );
    }
}
