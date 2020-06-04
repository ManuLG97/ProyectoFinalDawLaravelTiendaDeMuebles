<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $fillable = [
        'product_id', 'photo'
    ];

    public function producto(){
        return $this->belongsTo('App\Product','id');
    }
}
