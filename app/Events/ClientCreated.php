<?php

declare(strict_types=1);

namespace App\Events;

use Domain\Clients\Models\Client;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClientCreated
{
    use Dispatchable;
    use SerializesModels;

    public Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
