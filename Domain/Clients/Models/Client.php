<?php

declare(strict_types=1);

namespace Domain\Clients\Models;

use Domain\Items\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Get the items for the client.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
