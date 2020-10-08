<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{


    public function mobiliarias(){
        return $this->hasOne('App\Mobiliaria');
    }

}
