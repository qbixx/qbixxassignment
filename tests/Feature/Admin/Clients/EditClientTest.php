<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\Clients;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Tests\FeatureTest;

class EditClientTest extends FeatureTest
{
    /**
     * @test
     */
    public function an admin can edit clients(): void
    {
        $client = Client::factory()->create();

        $response = $this->get(route(RoutesEnum::ADMIN_EDIT_CLIENT, compact(['client'])));

        $response->assertOk();
        $response->assertSee($client->name);
    }
}
