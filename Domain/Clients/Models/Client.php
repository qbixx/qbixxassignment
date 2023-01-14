<?php

declare(strict_types=1);

namespace Domain\Clients\Models;

use App\Events\ClientCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        'created' => ClientCreated::class,
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
