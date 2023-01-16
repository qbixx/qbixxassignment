<?php

declare(strict_types=1);

namespace Domain\Clients\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Item extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'paragraph'];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
