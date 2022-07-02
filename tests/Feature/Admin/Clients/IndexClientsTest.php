<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\Clients;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Tests\FeatureTest;

class IndexClientsTest extends FeatureTest
{
    /**
     * @test
     */
    public function an admin can view clients(): void
    {
        $clients = Client::factory()->count(5)->create();

        $response = $this->get(route(RoutesEnum::ADMIN_INDEX_CLIENTS))
            ->assertOk();

        foreach ($clients as $client) {
            $response->assertSee($client->id)
                ->assertSee($client->name);
        }
    }
}
