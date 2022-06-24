<?php

declare(strict_types=1);

namespace Domain\Items\Models;

use Domain\Clients\Models\Client;
use Domain\Items\Enums\ItemType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Interfaces\Traits\HasTranslations;

class Item extends Model
{
    use HasFactory;
    use HasTranslations;

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
     * Get the client that owns the item.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
