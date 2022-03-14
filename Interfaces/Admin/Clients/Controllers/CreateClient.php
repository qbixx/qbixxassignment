<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use App\Http\Controllers\Controller;
use Domain\Clients\Models\ItemType;
use Inertia\Inertia;
use Inertia\Response;

class CreateClient extends Controller
{
    public function __invoke(): Response
    {
        $types = [];
        foreach (ItemType::all() as $type) {
            foreach (config('app.available_locales') as $lang) {
                $types[$lang][$type->id] = $type->getTranslation('name', $lang);
            }
        }
        return Inertia::render('Admin/Clients/Create', compact('types'));
    }
}
