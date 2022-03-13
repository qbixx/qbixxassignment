<?php
declare(strict_types=1);

namespace Domain\Items\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  use HasFactory;

  protected $fillable = [
      'title_en',
      'title_nl',
      'title_fr',
      'description_en',
      'description_nl',
      'description_fr',
      'type_en',
      'type_nl',
      'type_fr'
  ];

}