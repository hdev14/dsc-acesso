<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class LogController extends Controller
{
	public function criar(Request $req) {
		//Implementar validação
        $log = new Log($req->json()->all());
        //Pegar id de usuario
        $log->save();
        if($log){
            return response()->json(['message' => 'Log adicionado com sucesso.'], 200);
        }else{
            return response()->json(['message' => 'Sintaxe incorreta da requisição.'], 400);
        }
    }
}
