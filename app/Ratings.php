<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    //

protected $fillable=['client', 'appRate', 'agentRate','techRate','notes'];

   public  function client(){
                return $this->belongsTo('App\Client', 'client');
    }
}
