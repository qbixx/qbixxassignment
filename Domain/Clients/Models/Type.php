<?php

namespace Domain\Clients\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Type extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['name'];

    // public $translationModel = TypeTranslation::class;
}
