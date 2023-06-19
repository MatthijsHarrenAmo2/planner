<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist_Cards extends Model
{
    use HasFactory;
    protected $table = "checklist_cards";
    protected $fillable =
    [
      'cardsid' => 'cardsid',
      'checklistsid' => 'checklistsid',
    ];
}
