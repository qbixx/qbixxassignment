<?php

namespace Tests\Feature\Admin\Clients;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Tests\FeatureTest;

class EditClientTest extends FeatureTest
{
    /** @test */
    public function a_guest_can_view_client_edit_page()
    {
        $client = Client::factory()->create();

        $this->get(route(RoutesEnum::ADMIN_EDIT_CLIENT, $client))
            ->assertStatus(200)
            ->assertSee($client->name);
    }
}
