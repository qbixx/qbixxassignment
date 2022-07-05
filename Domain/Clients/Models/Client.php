<?php

declare(strict_types=1);

namespace Domain\Clients\Models;

use Database\Factories\ClientFactory;
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
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ClientFactory::new();
    }

    /**
     * Get the items for the client.
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
