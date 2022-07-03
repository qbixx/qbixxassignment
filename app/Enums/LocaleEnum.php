<?php

declare(strict_types=1);

namespace App\Enums;

use App\Services\Translator;

enum LocaleEnum: string
{
    public function label(): string
    {
        return static::getLabel($this);
    }

    public function getLabel(self $value): string
    {
        return match ($value) {
            LocaleEnum::EN => 'English',
            LocaleEnum::NL => 'Nederlands',
            LocaleEnum::FR => 'Français',
        };
    }

    public function getTranslation(?LocaleEnum $locale = null): string
    {
        return Translator::getTranslation('qbixxassignment.language', $locale);
    }

    public function getTranslations(): array
    {
        return Translator::getTranslations('qbixxassignment.language');
    }
    case EN = 'en';
    case NL = 'nl';
    case FR = 'fr';
}
