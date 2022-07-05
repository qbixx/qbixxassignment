<?php

declare(strict_types=1);

namespace Domain\Items\Models;

use Database\Factories\ItemFactory;
use Domain\Clients\Models\Client;
use Domain\Items\Enums\ItemType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Interfaces\Traits\HasTranslations;

class Item extends Model
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    public $translatable = ['title', 'paragraph'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'type' => ItemType::class,
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ItemFactory::new();
    }

    /**
     * Get the client that owns the item.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
