<?php

declare(strict_types=1);

namespace Domain\ClientItem\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ClientItem extends Model
{
    use HasFactory;
    use HasTranslations;

    public const WISDOM = 'Wisdom';
    public const DESIGN = 'Design';
    public const PHILOSOPHY = 'Philosophy';

    public $translatable = ['title', 'paragraph'];

    protected $appends = ['title_locale', 'paragraph_locale', 'type_locale'];

    public function getTitleLocaleAttribute()
    {
        return $this->getTranslation('title', $this->getLocale());
    }

    public function getTypeLocaleAttribute()
    {
        return __($this->type, [], $this->getLocale());
    }

    public function getParagraphLocaleAttribute()
    {
        return $this->getTranslation('paragraph', $this->getLocale());
    }

    private function getLocale()
    {
        return session('locale', 'en');
    }
}
