<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bords extends Model
{
    use HasFactory;
    protected $table = "bords";
    protected $fillable =
    [
      'workspaceid' => 'workspaceid',
      'naam' => 'naam',
      'beschrijving' => 'beschrijving',
      'positie' => 'positie'
    ];
}
