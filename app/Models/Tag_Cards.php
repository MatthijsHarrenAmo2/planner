<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag_Cards extends Model
{
    use HasFactory;
    protected $table = "tag_cards";
    protected $fillable =
    [
      'cardsid' => 'cardsid',
      'tagsid' => 'tagsid',
    ];
}
