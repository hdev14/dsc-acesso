<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    //protected $fillable = [];

    public function usuario() {  
        return $this->belongsTo('App\Usuario');
    }
}
