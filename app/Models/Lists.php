<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    use HasFactory;
    protected $table = "lists";
    protected $fillable =
    [
      'bordid' => 'bordid',
      'naam' => 'naam',
      'beschrijving	' => 'beschrijving',
      'positie' => 'positie',
      'status' => 'status'
    ]; 
}
