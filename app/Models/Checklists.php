<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklists extends Model
{
    use HasFactory;
    protected $table = "checklists";
    protected $fillable =
    [
      'naam' => 'naam',
      'afgerond' => 'afgerond',
    ];
}
