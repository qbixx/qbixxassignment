<?php

declare(strict_types=1);

namespace Interfaces\Admin\Clients\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use Domain\Clients\Models\Type;
use App\Http\Controllers\Controller;

class CreateClient extends Controller
{
    /**
     * @return Response
     */
    public function __invoke(): Response
    {
        $itemTypes = Type::all();

        return Inertia::render(
            'Admin/Clients/Create',
            compact('itemTypes'),
        );
    }
}
