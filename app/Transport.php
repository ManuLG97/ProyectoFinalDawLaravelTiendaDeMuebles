<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = ['id_distribuidor','id_user', 'direccion_usuario','fecha_recepcion','telefono_usuario',
        'cantidad','fragil'
    ];

    public function mobiliarias(){
        return $this->hasOne('App\Mobiliarias');
    }

    public function users(){
        return $this->hasMany('App\User');
    }
}
