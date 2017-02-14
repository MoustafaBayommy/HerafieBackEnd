<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Client;
class Order extends Model
{

    //new serving served
    //
    protected $dates=['deleted_at'];

protected $fillable=['client',
 'adressText', 
'adressLong',
'adressAlti',
'mainServiceType',
'serviceType',
'placeType'
,'onDate',
'onTime',
'textDescription',
'fileDescription'
];

   public  function client(){
                return $this->belongsTo('App\Client', 'client');
    }
}
