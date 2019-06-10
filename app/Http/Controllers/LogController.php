<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Log;

class LogController extends Controller
{
	public function criar(Request $req) {
		//Implementar validação
        $log = new Log($req->json()->all());
        //Pegar id de usuario
        //$token = token do header
        //$usuario = Usuario::where('token', $token)->first();
                
        if ($log->save())
        {
            return response()->json([
                'message' => 'Log adicionado com sucesso.'
            ], 200);
        }
        else
        {
            return response()->json([
                'message' => 'Sintaxe incorreta da requisição.'
            ], 400);
        }
    }
}
