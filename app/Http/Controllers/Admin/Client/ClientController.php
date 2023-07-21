<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Requests\Client\DestroyClientRequest;
use App\Http\Requests\Client\EditClientRequest;
use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ClientController
{
    public function index(): Response
    {
        return Inertia::render(
            'Admin/Clients/Index',
            [
                'clients' => Client::query()->get(),
            ],
        );
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Clients/Client', [
            'breadcrumbs' => [
                [
                    'name' => 'Clients',
                    'link' => route('admin.clients.index'),
                ]
            ]
        ]);
    }

    public function store(StoreClientRequest $request): RedirectResponse
    {
        Client::query()->create($request->safe(['name']));

        return Redirect::route('admin.clients.index')
            ->with(
                'success',
                'Client created successfully.'
            );
    }

    public function edit(EditClientRequest $request): Response
    {
        return $this->create()->with([
            'client' => Client::query()
                ->with('articles')
                ->find($request->validated('client')),
        ]);
    }

    public function update(UpdateClientRequest $request): RedirectResponse
    {
        /** @var Client $client */
        $client = Client::query()
            ->find($request->validated('id'))
            ->update($request->safe(['name']));

        return Redirect::route(
            'admin.clients.edit',
            [
                'client' => $client->id,
            ])
            ->with(
                'success',
                'Client updated successfully.'
            );
    }

    public function destroy(DestroyClientRequest $request): RedirectResponse
    {
        Client::query()
            ->where('id', $request->validated('id'))
            ->delete();

        return Redirect::route('admin.clients.index')
            ->with(
                'success',
                'Client deleted successfully.'
            );
    }
}
