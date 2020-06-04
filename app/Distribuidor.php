<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribuidor extends Model
{
    protected $fillable = ['id_mobiliaria','nombre_distribuidor', 'email','contraseña','telefono'
    ];

    public function mobiliarias(){
        return $this->hasMany('App\Mobiliaria');
    }

}
