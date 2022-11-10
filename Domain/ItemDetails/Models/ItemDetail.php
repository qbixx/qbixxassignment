<?php

declare(strict_types=1);

namespace Domain\ItemsDetails\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'paragraph',
        'type_detail_id',
        'item_id',
        'language_id'
    ];

}
