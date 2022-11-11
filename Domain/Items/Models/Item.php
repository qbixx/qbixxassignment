<?php

declare(strict_types=1);

namespace Domain\Items\Models;

use Domain\ItemDetails\Models\ItemDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Item extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'paragraph',
    ];

    protected $fillable = [
        'type_id',
    ];


    public function details()
    {
        return $this->hasMany(ItemDetail::class,'item_id','id');
    }
}
