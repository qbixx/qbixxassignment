<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\Clients;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Tests\FeatureTest;

class UpdateClientTest extends FeatureTest
{
    private Client $client;

    private array $validItemData = [];

    public function setUp(): void
    {
        parent::setUp();
        $this->client = Client::factory()->create();
        $this->validItemData = $this->generateValidData();
    }

    /**
     * @test
     */
    public function a guest can update client(): void
    {
        $formData = [
            'name' => 'New name',
            'items' => $this->validItemData,
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
    public function a guest can not update clients name with invalid data(string $columnName, string $value, array $itemsData): void
    {
        $formData = [
            $columnName => $value,
            'items' => $itemsData,
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
            'name required' => ['name', '', $this->validItemData],
            'name min 4' => ['name', 'fre', $this->validItemData],
            'name max 30' => ['name', 'Do you know someone with a name longer than 30 characters?', $this->validItemData],
        ];
    }

    private function generateValidData()
    {
        $data = [];

        foreach ($this->client->items as $item) {
            $data[$item->id] = [
                'title' => [
                    'en' => 'title en',
                    'fr' => 'title fr',
                    'nl' => 'title nl',
                ],
                'paragraph' => [
                    'en' => 'paragraph en',
                    'fr' => 'paragraph fr',
                    'nl' => 'paragraph nl',
                ],
                'type' => 'Wisdom',
            ];
        }

        return $data;
    }
}
