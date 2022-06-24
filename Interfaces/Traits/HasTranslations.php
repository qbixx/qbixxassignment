<?php

declare(strict_types=1);

namespace Interfaces\Traits;

use Illuminate\Support\Facades\App;
use Spatie\Translatable\HasTranslations as BaseHasTranslations;

trait HasTranslations
{
    use BaseHasTranslations;

    public function toArray()
    {
        $attributes = parent::toArray();
        foreach ($this->getTranslatableAttributes() as $field) {
            $attributes[$field] = $this->getTranslation($field, App::getLocale());
        }

        return $attributes;
    }
}
