<?php

namespace Domain\Items\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Item extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'paragraph',
        'type',
    ];

    public array $translatable = [
        'title',
        'paragraph',
    ];
}
