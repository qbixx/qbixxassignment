<?php

namespace Domain\Clients\Repositories;

use Domain\Clients\Models\Client;
use Domain\Clients\Repositories\Concerns\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    public function create(array $data): Client
    {
        return Client::query()->create($data);
    }

    public function update(Client $client, array $data): Client
    {
        $client->update($data);

        return $client;
    }
}
