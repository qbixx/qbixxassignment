<?php

declare(strict_types=1);

namespace Domain\Items\Models;

use Domain\ItemDetails\Models\ItemDetail;
use Domain\Types\Models\Type;
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


    public function type()
    {
        return $this->belongsTo(Type::class,'type_id','id');
    }
}
