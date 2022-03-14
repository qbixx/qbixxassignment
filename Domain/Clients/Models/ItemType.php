<?php

namespace Domain\Clients\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ItemType extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = [
        'name'
    ];

    protected $fillable = [
        'name'
    ];
}
