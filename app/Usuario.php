<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $fillable = [
        'login',
        'senha',
        'nome',
        'cpf', 
        'tipo_acesso',
    ];

    public function items() {
        return $this->hasMany('App\Log');
    }
}
