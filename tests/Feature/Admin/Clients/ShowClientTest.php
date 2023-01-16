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

        $response = $this->get(route(RoutesEnum::FRONT_SHOW_CLIENT, [$client->id]));
        $response->assertOk();

        foreach ($client->items as $item) {
            $response->assertSee($item->title);
            $response->assertSee($item->paragraph);
            $response->assertSee($item->type);
        }
    }

    /**
     * @test
     */
    public function a guest can not view not existing client(): void
    {
        $response = $this->get(route(RoutesEnum::FRONT_SHOW_CLIENT, 15));
        $response->assertNotFound();
    }
}
