<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\Clients;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Tests\FeatureTest;

class DeleteClientTest extends FeatureTest
{
    /**
     * @test
     */
    public function a guest can delete client(): void
    {
        $client = Client::factory()->create();
        $items = $client->items;
        $this->assertCount(3, $items);

        $this->delete(
            route(
                RoutesEnum::ADMIN_DELETE_CLIENT,
                [
                    'id' => $client->id,
                ]
            )
        )->assertRedirect(route(RoutesEnum::ADMIN_INDEX_CLIENTS));

        $this->assertModelMissing($client);
        foreach ($items as $item) {
            $this->assertModelMissing($item);
        }
    }

    /**
     * @test
     */
    public function a guest can not delete client with invalid data(): void
    {
        $this->delete(
            route(
                RoutesEnum::ADMIN_DELETE_CLIENT,
                [
                    'id' => 15,
                ]
            )
        )->assertNotFound();
    }
}
