<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspaces extends Model
{
    use HasFactory;
    protected $table = "workspaces";
    protected $fillable =
    [
      'naam' => 'naam',
      'beschrijving' => 'beschrijving',
      'positie' => 'positie'
    ];
}
