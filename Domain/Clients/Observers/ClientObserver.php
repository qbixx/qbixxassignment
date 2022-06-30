<?php

declare(strict_types=1);

namespace Domain\Clients\Observers;

use Domain\Clients\Models\Client;

class ClientObserver
{
    public function created(Client $client): void
    {
    }

    public function updated(Client $client): void
    {
    }

    public function deleted(Client $client): void
    {
        $client->items()->delete();
    }

    public function restored(Client $client): void
    {
    }

    public function forceDeleted(Client $client): void
    {
    }
}
