<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  protected $fillable = ['name'];
  public $timestamps = false;

  public function Receivers()
  {
    return $this->belongsTo(Receiver::class);
  }
}
