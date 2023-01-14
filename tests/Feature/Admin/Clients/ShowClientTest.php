<?php

declare(strict_types=1);

namespace Tests\Feature\Admin\Clients;

use App\Enums\AppLanguage;
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
        $appLanguages = AppLanguage::cases();

        foreach ($appLanguages as $appLanguage) {
            $this->get(route(RoutesEnum::FRONT_SHOW_CLIENT, [$appLanguage->name, $client->id]))
                ->assertOk();
        }
    }
}