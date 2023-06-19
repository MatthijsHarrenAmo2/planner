<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = "Users";
    protected $fillable =
    [
      'voornaam' => 'voornaam',
      'tussenvoegsel' => 'tussenvoegsel',
      'achternaam' => 'achternaam',
      'gebruikersnaam' => 'gebruikersnaam',
      'wachtwoord' => 'wachtwoord',
      'email' => 'email'
    ];
}
