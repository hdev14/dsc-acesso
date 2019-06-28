<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Log;

// ------------ // Em construção, mas já funcionando // ------------ //
class LogController extends Controller
{
	public function criar(Request $req) {
		
        $log = new Log($req->json()->all());
        //$token = token do header
        $token = $req->header('token');
        $usuario = Usuario::where('token', $token)->first();

        if ($usuario == null)
        {
            return response()->json([
                'message' => 'Erro: usuário não encontrado.'
            ], 404);
        }

        //Pegar id de usuario
        $idUsuario = $usuario->id;
        $log->usuario_id = $idUsuario;
                
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
