<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobiliaria extends Model
{


    protected $fillable = ['id_producto', 'nombre_mobiliaria','adresa', 'telefono','email'
    ];

    public function productos(){
        return $this->hasMany('App\Producto');
    }

    public function distribuidors(){
        return $this->hasMany('App\Distribuidor');
    }

    public function facturas(){
        return $this->hasMany('App\Factura');
    }
    public function transports(){
        return $this->hasMany('App\Transport');
    }
}
