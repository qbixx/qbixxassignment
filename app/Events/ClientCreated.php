<?php

declare(strict_types=1);

namespace App\Events;

use Domain\Clients\Models\Client;
use Illuminate\Foundation\Events\Dispatchable;

class ClientCreated
{
    use Dispatchable;

    public int $id;

    public function __construct(Client $client)
    {
        $this->id = $client->id;
    }
}
