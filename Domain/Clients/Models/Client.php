<?php

declare(strict_types=1);

namespace Domain\Clients\Models;

use Domain\Items\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['items'];

    /**
     * Get the items for the client.
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
