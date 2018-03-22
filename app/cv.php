<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cv extends Model
{
    protected $fillable=['nama','detail','status'];
    
    public function User()
  {
    return $this->belongsTo('App\User','id_user');
  }
}
