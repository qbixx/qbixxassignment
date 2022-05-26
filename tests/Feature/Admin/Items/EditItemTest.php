<?php

namespace Tests\Feature\Admin\Items;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Domain\Items\Models\Item;
use Tests\FeatureTest;

class EditItemTest extends FeatureTest
{
    /** @test */
    public function a_guest_can_edit_an_item()
    {
        $client = Client::factory()->create();
        $item = Item::factory()->state([
            'client_id' => $client->id,
        ])->create();

        $this->get(route(RoutesEnum::ADMIN_EDIT_ITEM, [$client, $item]))
            ->assertStatus(200)
            ->assertSee($item->title);
    }
}
