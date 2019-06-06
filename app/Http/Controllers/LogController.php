<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;

class LogController extends Controller
{
	public function criar(Request $req) {
		//Implementar validação
        $log = $req->json();
        $log->usuario_id = 1;
        $log->save();
        return response()->json(['msg' => 'Log adicionado com sucesso'], 200);
    }
}
