<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{

    public function index(){
    	// Depois colocar uma ordenação.
    	$usuario = Usuario::all();

    	return view('usuario.index', [
    		'usuarios' => $usuarios,
    	]);
    }

    public function autenticar(Request $req){}

    public function criar(Request $req){}

    public function editar(Request $req, $id = null){
    	
    	if(is_null($id)){
    		$usuario = Usuario::find($req->id);
    		$update = $usuario->update([
    			'login' => $req->login,
    			'senha' => $req->senha,
    			'nome' => $req->nome,
    			'cpf' => $req->cpf,
    			'tipo_acesso' => $req->tipo_acesso
    		]);

    		if($update){
    			// Se não editar...
    		}

    		return redirect('/index');
    	}

    	// Se tiver o paramento $id retorna o formulário.
    	return view('usuario.editar',[
    		'usuario' => Usuario::find($id),
    	]);
    }

    public function excluir(){}
}
