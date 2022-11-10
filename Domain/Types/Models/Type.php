<?php

declare(strict_types=1);

namespace Domain\Types\Models;

use Domain\TypeDetails\Models\TypeDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function details(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TypeDetail::class, 'type_id', 'id');
    }
}
