<?php

namespace App\Providers;

use Domain\Clients\Repositories\ClientRepository;
use Domain\Clients\Repositories\Concerns\ClientRepositoryInterface;
use Domain\Items\Repositories\Concerns\ItemRepositoryInterface;
use Domain\Items\Repositories\ItemRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
        $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);
    }
}
