<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Article extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'articles';

    protected $fillable = [
        'client_id',
        'title',
        'paragraph',
        'type',
    ];

    public $translatable = [
        'title',
        'paragraph',
        'type',
    ];

    protected $casts = [
        'title' => 'json',
        'paragraph' => 'json',
        'type' => 'json',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
