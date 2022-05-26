<?php

namespace Tests\Feature\Admin\Clients;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Tests\FeatureTest;

class DeleteClientTest extends FeatureTest
{
    /** @test */
    public function a_guest_can_delete_a_client()
    {
        $client = Client::factory()->create();

        $this->delete(route(RoutesEnum::ADMIN_DELETE_CLIENT, $client))
            ->assertRedirect(route(RoutesEnum::ADMIN_INDEX_CLIENTS));

        $clients = Client::all();

        $this->assertCount(0, $clients);
    }
}
