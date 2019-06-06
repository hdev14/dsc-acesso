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
        return response()->json(['msg' => 'Log adicionado com sucesso'], 200);
    }
}
