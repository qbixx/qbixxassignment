<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\Clients;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Tests\FeatureTest;

class ShowClientTest extends FeatureTest
{
    /**
     * @test
     */
    public function a guest can view clients(): void
    {
        $client = Client::factory()->create();

        $this->get(route(RoutesEnum::FRONT_SHOW_CLIENT, [$client->id]))
            ->assertOk();
    }
}
