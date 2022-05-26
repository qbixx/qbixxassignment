<?php

namespace Tests\Feature\Base\Locale;

use Tests\FeatureTest;

class UpdateLocaleTest extends FeatureTest
{
    /**
     * @test
     */
    public function a_guest_can_update_locale()
    {
        $locale = 'nl';

        $this->post("/locale/$locale")->assertStatus(302);

        $this->assertEquals($locale, session('locale'));
    }

    /**
     * @test
     */
    public function a_guest_can_not_update_locale_with_invalid_locale()
    {
        $locale = 'invalid';

        $this->post("/locale/$locale")->assertStatus(302);

        $this->assertEquals(config('app.fallback_locale'), session('locale'));
    }
}
