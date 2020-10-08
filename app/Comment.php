<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment','user_id','product_id'];

    public  function users(){
        return  $this->belongsTo('App\User');
    }

    public  function productos(){
        return  $this->belongsTo('App\Producto');
    }
}
