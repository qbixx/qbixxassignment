<?php

declare(strict_types=1);

namespace Domain\Clients\Models;

use App\Events\ClientCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        'created' => ClientCreated::class,
    ];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
