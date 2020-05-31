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



    public function scopeNombre_producto($query,$nombre_producto)
    {
        if($nombre_producto)
            return $query->where('nombre_producto','LIKE',"%$nombre_producto%");
    }
    public function scopeMarca($query,$marca)
    {
        if($marca)
            return $query->where('marca','LIKE',"%$marca%");
    }
    public function scopeTipo_mueble($query,$tipo_mueble)
    {
        if($tipo_mueble)
            return $query->where('tipo_mueble','LIKE',"%$tipo_mueble%");
    }
    public function scopeDescripcion($query,$descripcion)
    {
        if($descripcion)
            return $query->where('descripcion','LIKE',"%$descripcion%");
    }

}
