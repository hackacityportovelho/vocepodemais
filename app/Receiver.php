<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
  protected $fillable = ['cnpj', 'name', 'email', 'password'];

  public function Areas()
  {
    return $this->belongsToMany(Area::class);
  }

  public function Points()
  {
    return $this->hasMany(Point::class);
  }
}
