<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    //Exclusão lógica
    use SoftDeletes;

    protected $fillable = [
        'login',
        'senha',
        'nome',
        'cpf', 
        'tipo_acesso',
        'ativo',
        //'token'
    ];

    //Quando deletar, coluna preenchida com data e hora da exclusão.
    protected $dates = ['deleted_at'];

    public function items() {
        return $this->hasMany('App\Log');
    }
}
