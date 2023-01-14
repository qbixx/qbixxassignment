<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\Clients;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Tests\FeatureTest;

class UpdateClientTest extends FeatureTest
{
    private Client $client;

    public function setUp(): void
    {
        parent::setUp();
        $this->client = Client::factory()->create();
    }

    /**
     * @test
     */
    public function a guest can update client(): void
    {
        $itemData = collect($this->client->items)
            ->map(function ($item) {
                return [
                    $item->id => collect($item)->only(['title', 'paragraph', 'type'])->toArray(),
                ];
            })->toArray();

        $result = [];

        foreach ($itemData as $formItem) {
            foreach ($formItem as $id => $data) {
                $result[$id] = $data;
            }
        }

        $formData = [
            'name' => 'New name',
            'items' => $result,
        ];

        $this->patch(
            route(
                RoutesEnum::ADMIN_UPDATE_CLIENT,
                [
                    'id' => $this->client->id,
                ]
            ),
            $formData
        )->assertRedirect(route(RoutesEnum::ADMIN_INDEX_CLIENTS));

        $client = Client::findOrFail($this->client->id);

        $this->assertSame('New name', $client->name);
    }

    /**
     * @test
     *
     * @dataProvider invalidData
     */
    public function a guest can not update clients name with invalid data(string $columnName, string $value): void
    {
        $formData = [
            $columnName => $value,
        ];

        $this->patch(
            route(
                RoutesEnum::ADMIN_UPDATE_CLIENT,
                [
                    'id' => $this->client->id,
                ]
            ),
            $formData
        )->assertSessionHasErrors($columnName);
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
