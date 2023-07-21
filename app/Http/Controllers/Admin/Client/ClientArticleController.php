<?php

namespace App\Http\Controllers\Admin\Client;

use App\Enums\Client\ClientArticleTypesEnum;
use App\Http\Requests\Client\DestroyClientArticleRequest;
use App\Http\Requests\Client\StoreClientArticleRequest;
use App\Http\Requests\Client\UpdateClientArticleRequest;
use App\Models\Article;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Redirect;

class ClientArticleController
{
    public function create(Client $client)
    {
        return Inertia::render('Admin/Clients/Articles/Article', [
            'client' => $client,
            'breadcrumbs' => [
                [
                    'link' => route('admin.clients.index'),
                    'name' => 'Clients',
                ],
                [
                    'link' => route('admin.clients.edit', ['client' => $client->id]),
                    'name' => $client->name,
                ],
            ],
            'articleTypes' => ClientArticleTypesEnum::cases(),
        ]);
    }

    public function store(StoreClientArticleRequest $request): RedirectResponse
    {
        $article = Article::query()
            ->create($request->safe([
                'client_id',
                'title',
                'paragraph',
                'type',
            ]));

        return Redirect::route(
            'admin.clients.articles.edit',
            [
                'client' => $article->client_id,
                'article' => $article->id,
            ])
            ->with('success', 'Article created successfully.');
    }

    public function destroy(DestroyClientArticleRequest $request)
    {
        Article::query()
            ->where('id', $request->validated('article_id'))
            ->delete();

        return Redirect::route(
            'admin.clients.edit',
            [
                'client' => $request->route('client')
            ])
            ->with('success', 'Article deleted successfully.');
    }

    public function edit(Client $client, Article $article)
    {
        return $this->create($client)->with([
            'article' => $article,
        ]);
    }

    public function update(
        UpdateClientArticleRequest $request,
        Client $client,
        Article $article,
    )
    {
        $article
            ->update($request->safe([
                'client_id',
                'title',
                'paragraph',
                'type',
            ]));

        return Redirect::route(
            'admin.clients.articles.edit',
            [
                'client' => $client->id,
                'article' => $article->id,
            ])
            ->with('success', 'Article updated successfully.');
    }
}
