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

class EditClient extends Controller
{
    public function __invoke(Client $client): Response
    {
        $types = Type::all();
        $items = $client->items;
        $languages = Language::all();
        return Inertia::render(
            ClientView::ADMIN_EDIT,
            compact(['client','types','items','languages']),
        );
    }
}
