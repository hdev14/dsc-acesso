<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Usuario extends Model implements AuthenticatableContract
{   
    use Authenticatable;

    protected $fillable = [
        'login',
        'senha',
        'nome',
        'cpf', 
        'tipo_acesso',
    ];

    // Sobrescrita dos métodos para a autenticação do usuário.
    public function getAuthIdentifierName(){
        return $this->login;
    }

    public function getAuthPassword(){
        return Hash::make($this->senha);;
    }

    public function getAuthIdentifier(){
        return $this->login;
    }

    public function items() {
        return $this->hasMany('App\Log');
    }
}
