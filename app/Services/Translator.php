<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\LocaleEnum;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class Translator
{
    public static function getTranslation(string $key, ?LocaleEnum $locale = null): string
    {
        return Lang::get($key, [], $locale ?? App::getLocale());
    }

    public static function getTranslations(string $key)
    {
        return collect(LocaleEnum::cases())->mapWithKeys(
            fn (LocaleEnum $locale) => [$locale->value => Lang::get($key, [], $locale->value)]
        )->all();
    }
}
