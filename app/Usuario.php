<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    //Exclusão lógica
    use SoftDeletes;

    //protected $fillable = [];

    //Quando deletar, coluna preenchida com data e hora da exclusão.
    protected $dates = ['deleted_at'];

    public function items() {
        return $this->hasMany('App\Log');
    }
}
