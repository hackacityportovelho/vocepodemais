<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Donator extends Model
{
  protected $fillable = ['uid', 'name', 'email', 'password'];
}
