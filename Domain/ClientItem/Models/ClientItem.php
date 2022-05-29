<?php

declare(strict_types=1);

namespace Domain\ClientItem\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ClientItem extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'paragraph'];

    protected $appends = ['title_locale', 'paragraph_locale'];

    const Wisdom = 'Wisdom';
    const Design = 'Design';
    const Philosophy = 'Philosophy';

    public function getTitleLocaleAttribute(){
        $locale = session('locale') ?? "en";
        return $this->getTranslation('title', $locale);

    }
    public function getParagraphLocaleAttribute(){
        $locale = session('locale') ?? "en";
        return $this->getTranslation('paragraph', $locale);

    }
}
