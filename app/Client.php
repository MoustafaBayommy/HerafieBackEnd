<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Ratings;

class Client extends Model
{
    //

protected $fillable=['mobile', 'name', 'email','city','neighborhood','knownFrom'];

  public   function orders(){
      return $this->hasMany('App\Order','client');

    }


  public   function ratings(){
      return $this->hasMany('App\Ratings','client');

    }
}
