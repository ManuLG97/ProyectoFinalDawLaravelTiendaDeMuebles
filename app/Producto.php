<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['id_usuario', 'id_mobiliaria','nombre','marca', 'tipo_mueble','descripcion','dimensiones',
        'volum','oferta','cantidad','precio_sin_montaje','precio_con_montaje','fragil','foto'
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function mobiliarias(){
        return $this->hasOne('App\Mobiliaria');
    }
}
