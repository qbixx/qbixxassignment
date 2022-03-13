<?php

declare(strict_types=1);

namespace Domain\Clients\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Domain\Items\Models\Item;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function items(): HasMany {
      return $this->hasMany(Item::class);
    }
}
