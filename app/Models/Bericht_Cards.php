<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bericht_Cards extends Model
{
    use HasFactory;
    protected $table = "bericht_cards";
    protected $fillable =
    [
      'cardsid' => 'cardsid',
      'berichtenid' => 'berichtenid'
    ];
}
