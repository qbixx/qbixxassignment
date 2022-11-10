<?php

declare(strict_types=1);

namespace Domain\TypeDetails\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'language_id',
    ];
}
