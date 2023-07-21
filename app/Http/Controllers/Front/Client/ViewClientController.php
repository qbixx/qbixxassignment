<?php

namespace App\Http\Controllers\Front\Client;

use App\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ViewClientController
{
    public function __invoke(Request $request): Response
    {
        $client = Client::query()
            ->with('articles')
            ->find($request->route('client'));

        return Inertia::render('Front/Clients/Show', [
            'client' => $client
        ]);
    }
}
