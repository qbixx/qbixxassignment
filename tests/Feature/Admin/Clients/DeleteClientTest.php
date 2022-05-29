<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\Clients;

use App\Enums\RoutesEnum;
use Illuminate\Http\Response;
use Tests\FeatureTest;

class DeleteClientTest extends FeatureTest
{
    /**
     * @test
     */
    public function a guest can delete a client(): void
    {
        [$client, $items, $formData] = $this->prepareClientItemsData();

        $this->assertSame(3, $client->items()->count());

        $this->delete(route(RoutesEnum::ADMIN_DELETE_CLIENT, ['client' => $client->id]))
            ->assertRedirect(route(RoutesEnum::ADMIN_INDEX_CLIENTS));

        $this->assertSame(null, $client->fresh());
    }


    /**
     * @test
     */
    public function a guest cant update a client with invalid ID (): void
    {
        $this->delete(route(RoutesEnum::ADMIN_DELETE_CLIENT, ['client' => 222]))
        ->assertStatus(Response::HTTP_NOT_FOUND);
    }


}
