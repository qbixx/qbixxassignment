<?php

namespace Domain\Clients\Repositories\Concerns;

use Domain\Clients\Models\Client;

interface ClientRepositoryInterface
{
    public function create(array $data): Client;

    public function update(Client $client, array $data): Client;
}
