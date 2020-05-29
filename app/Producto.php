<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['id_usuario', 'nombre_producto','marca', 'tipo_mueble','descripcion','dimensiones',
        'volum','oferta','cantidad','precio_sin_montaje','precio_con_montaje','fragil','foto'
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function mobiliarias(){
        return $this->hasOne('App\Mobiliaria');
    }
    public function photos()
    {
        return $this->hasMany('App\Photos','product_id');
    }
}
