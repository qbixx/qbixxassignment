<?php

namespace Tests\Feature\Admin\Clients;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Tests\FeatureTest;

class UpdateClientTest extends FeatureTest
{
    /** @test */
    public function a_guest_can_update_the_client()
    {
        $client = Client::factory()->create();

        $data = [
            'name' => 'New Name',
        ];

        $this->patch(route(RoutesEnum::ADMIN_UPDATE_CLIENT, $client), $data)
            ->assertRedirect(route(RoutesEnum::ADMIN_INDEX_CLIENTS));

        $client = $client->refresh();

        $this->assertEquals($data['name'], $client->name);
    }

    /** @test
     *
     * @dataProvider invalidData
     */
    public function a_guest_can_not_update_the_client_with_invalid_data(string $columnName, string $value)
    {
        $client = Client::factory()->create();

        $data = [
            $columnName => $value,
        ];

        $this->patch(route(RoutesEnum::ADMIN_UPDATE_CLIENT, $client), $data)
            ->assertSessionHasErrors('name');

        $client = $client->refresh();

        $this->assertNotEquals($data['name'], $client->name);
    }

    public function invalidData(): array
    {
        return [
            'required' => ['name', ''],
            'min 4' => ['name', 'fre'],
            'max 30' => ['name', 'Do you know someone with a name longer than 30 characters?'],
        ];
    }
}
