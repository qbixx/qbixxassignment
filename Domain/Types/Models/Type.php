<?php

declare(strict_types=1);

namespace Domain\Types\Models;

use Domain\TypeDetails\Models\TypeDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Type extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = [
        'name',
    ];
}
