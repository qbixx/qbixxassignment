<?php

namespace Domain\Clients\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name'];
}
