<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = ['id_mobiliaria','codigo_pago','nombre_usuario', 'nombre_usuario','fecha_compra','cantidad',
        'precio_total'
    ];

    public function mobiliarias(){
        return $this->hasOne('App\Mobiliaria');
    }

}
