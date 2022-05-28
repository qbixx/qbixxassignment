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

    const Wisdom = 'Wisdom';
    const Design = 'Design';
    const Philosophy = 'Philosophy';
}
