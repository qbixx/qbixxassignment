<?php

declare(strict_types=1);

namespace Domain\Clients\Models;

use Domain\Items\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(Item::class,'client_id','id');
    }

}
