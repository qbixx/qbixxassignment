<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\Clients;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Domain\Items\Models\Item;
use Illuminate\Http\Request;
use Interfaces\Admin\Clients\Resources\EditItemResource;
use Tests\FeatureTest;

class UpdateClientTest extends FeatureTest
{
    /**
     * @test
     */
    public function an admin can update a new client(): void
    {
        $client = Client::factory()->create([
            'name' => 'Test name',
        ]);

        $name = 'Updated test name';

        $defaultItems = Item::factory()->makeDefaults($client);

        $items = EditItemResource::collection($defaultItems)
            ->response(Request::create(route(RoutesEnum::ADMIN_EDIT_CLIENT, compact('client')), 'GET'))
            ->getData(true);

        $response = $this->put(
            route(RoutesEnum::ADMIN_UPDATE_CLIENT, compact('client')),
            compact(['name', 'items'])
        );

        $response->assertRedirect(route(RoutesEnum::ADMIN_INDEX_CLIENTS));

        $client = Client::with('items')->findOrFail($client->id);

        $this->assertSame('Updated test name', $client->name);
        $this->assertCount(3, $client->items);

        $client->items->each(function (Item $item, $key) use ($defaultItems): void {
            $this->assertSame($item->client_id, $defaultItems[$key]->client_id);
            $this->assertSame($item->type, $defaultItems[$key]->type);
            $this->assertSame($item->title, $defaultItems[$key]->title);
            $this->assertSame($item->paragraph, $defaultItems[$key]->paragraph);
        });
    }
}
