<?php

declare(strict_types=1);

namespace App\Enums;

use App\Services\Translator;

enum LocaleEnum: string
{
    case EN = 'en';
    case NL = 'nl';
    case FR = 'fr';
    public function getTranslation(?LocaleEnum $locale = null): string
    {
        return Translator::getTranslation('qbixxassignment.language', $locale);
    }

    public function getTranslations(): array
    {
        return Translator::getTranslations('qbixxassignment.language');
    }
}
