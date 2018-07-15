<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
  protected $fillable = ['code', 'description', 'latitude', 'longitude'];

  public function Areas()
  {
    return $this->belongsToMany(Area::class);
  }

  public function Receiver()
  {
    return $this->belongsTo(Receiver::class);
  }

}
