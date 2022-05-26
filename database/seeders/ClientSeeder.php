<?php

declare(strict_types=1);

namespace Database\Seeders;

use Domain\Clients\Models\Client;
use Domain\Items\Repositories\Concerns\ItemRepositoryInterface;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function __construct(
        protected ItemRepositoryInterface $itemRepository
    )
    {
    }

    public function run(): void
    {
        Client::factory()->count(5)->afterCreating(function (Client $client) {
            $this->itemRepository->createDefaultItemsForClient($client);
        })->create();
    }
}
