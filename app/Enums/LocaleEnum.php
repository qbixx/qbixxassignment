<?php

declare(strict_types=1);

namespace App\Enums;

use App\Services\Translator;

enum LocaleEnum: string
{
    public static function default(): self
    {
        return self::from(config('app.locale'));
    }

    public function label(): string
    {
        return self::getLabel($this);
    }

    public function getLabel(self $value): string
    {
        return match ($value) {
            self::EN => 'English',
            self::NL => 'Nederlands',
            self::FR => 'Français',
        };
    }

    public function getTranslation(?self $locale = null): string
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
