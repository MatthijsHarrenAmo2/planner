<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berichten extends Model
{
    use HasFactory;
    protected $table = "berichten";
    protected $fillable =
    [
      'userid' => 'userid',
      'bericht' => 'bericht'
    ];
}
