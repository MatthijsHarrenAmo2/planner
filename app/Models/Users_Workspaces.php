<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_Workspaces extends Model
{
    use HasFactory;
    protected $table = "checklist_cards";
    protected $fillable =
    [
      'usersid' => 'usersid',
      'workspaceid' => 'workspaceid',
    ];
}
