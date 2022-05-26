<?php

namespace Tests\Feature\Admin\Items;

use App\Enums\RoutesEnum;
use Domain\Clients\Models\Client;
use Domain\Items\Models\Item;
use Tests\FeatureTest;

class UpdateItemTest extends FeatureTest
{
    /** @test */
    public function a_guest_can_update_an_item()
    {
        $client = Client::factory()->create();

        $item = Item::factory()->state([
            'client_id' => $client->id,
        ])->create();

        $data = [
            'title' => [
                'en' => 'New title',
                'nl' => 'Nieuwe titel',
                'fr' => 'Nouveau titre',
            ],
            'paragraph' => [
                'en' => 'New paragraph',
                'nl' => 'Nieuwe paragraaf',
                'fr' => 'Nouvelle paragraphe',
            ],
            'type' => 'Design'
        ];

        $this->patch(route(RoutesEnum::ADMIN_UPDATE_ITEM, [$client, $item]), $data)
            ->assertRedirect(route(RoutesEnum::ADMIN_EDIT_CLIENT, $client));

        $item->refresh();

        $this->assertEquals($data['title'], $item->getTranslations('title'));
        $this->assertEquals($data['paragraph'], $item->getTranslations('paragraph'));
        $this->assertEquals($data['type'], $item->type);
    }
}
