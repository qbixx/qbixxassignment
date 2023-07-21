<?php

namespace App\Enums;

enum LanguagesEnum: string
{
    case ENGLISH = 'en';
    case DUTCH = 'nl';
    case FRENCH = 'fr';

    public function label(): string
    {
        return match($this) {
            LanguagesEnum::ENGLISH => 'English',
            LanguagesEnum::DUTCH => 'Nederlands',
            LanguagesEnum::FRENCH => 'Français',
        };
    }

    public static function toVue(): array
    {
        return collect(self::cases())
            ->mapWithKeys(
                static fn (LanguagesEnum $language): array => [$language->value => $language->label()],
            )
            ->toArray();
    }
}
