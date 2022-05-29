<?php

declare(strict_types=1);

namespace Tests\Feature\Admin;

use App\Enums\RoutesEnum;
use Illuminate\Http\Response;
use Tests\FeatureTest;

class UpdateLocaleTest extends FeatureTest
{
    /**
     * @test
     */
    public function a guest can update locale (): void
    {
        $this->post(route(RoutesEnum::LOCALE_UPDATE, ['locale' => 'fr']))
            ->assertRedirect();

        $this->assertSame('fr', session('locale'));
    }

    /**
     * @test
     */
    public function a guest cant update a locale with invalid locale(): void
    {
        $this->post(route(RoutesEnum::LOCALE_UPDATE, ['locale' => 'wrong']))
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
