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
    public function a guest can edit a client(): void
    {
        $client = Client::factory()->create();

        $this->get(route(RoutesEnum::ADMIN_EDIT_CLIENT, $client->id))
            ->assertOk();
    }

    /**
     * @test
     */
    public function a guest can not edit an not existing client(): void
    {
        $this->get(route(RoutesEnum::ADMIN_EDIT_CLIENT, 15))
            ->assertNotFound();
    }
}
