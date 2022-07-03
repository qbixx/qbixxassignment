<?php

declare(strict_types=1);

namespace Domain\Items\Enums;

use App\Enums\LocaleEnum;
use App\Services\Translator;

enum ItemType: string
{
    public function getConfig(): array
    {
        return config('qbixxassignment.items.'.$this->value);
    }

    public function getTranslation(?LocaleEnum $locale = null): string
    {
        return Translator::getTranslation('qbixxassignment.items.'.$this->value.'.type', $locale);
    }

    public function getTranslations(): array
    {
        return Translator::getTranslations('qbixxassignment.items.'.$this->value.'.type');
    }
    case Wisdom = 'wisdom';
    case Philosophy = 'philosophy';
    case Design = 'design';
}
