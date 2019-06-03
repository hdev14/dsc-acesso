<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;

=======
>>>>>>> master

class UsuarioController extends Controller
{

<<<<<<< HEAD
    public function index() {
=======
    public function index(){
>>>>>>> master
    	// Depois colocar uma ordenação.
    	$usuario = Usuario::all();

    	return view('usuario.index', [
    		'usuarios' => $usuarios,
    	]);
    }

<<<<<<< HEAD
    public function autenticar(Request $req) {}

    public function criar(Request $req) {
        //Validação básica, pode ser melhorada depois se precisar
        $req->validate([
            'usuarios.login' => 'max:50|required|unique:usuarios,login',
            'usuarios.senha' => 'max:60|same:confirmSenha|required',
            'usuarios.nome' => 'max:200|required',
            'usuarios.cpf' => 'max:11|text|required',
            'usuarios.tipo_acesso' => 'max:3|required',
            'usuarios.ativo' => 'required'
        ]);
        $usuario = new Usuario($req->usuarios);
        //Criptografia da senha
        $usuario->senha = Hash::make($usuario->senha);
        $usuario->save();

        //Confirmação (Criar na visão)
        $req->session()->flash('message-type','alert-success');
        $req->session()->flash('message','Usuários criado com sucesso!');

        return redirect('/index');
    }

    public function editar(Request $req, $id = null) {
    	
    	if(is_null($id)) {
=======
    public function autenticar(Request $req){}

    public function criar(Request $req){}

    public function editar(Request $req, $id = null){
    	
    	if(is_null($id)){
>>>>>>> master
    		$usuario = Usuario::find($req->id);
    		$update = $usuario->update([
    			'login' => $req->login,
    			'senha' => $req->senha,
    			'nome' => $req->nome,
    			'cpf' => $req->cpf,
    			'tipo_acesso' => $req->tipo_acesso
    		]);

<<<<<<< HEAD
    		if($update) {
=======
    		if($update){
>>>>>>> master
    			// Se não editar...
    		}

    		return redirect('/index');
    	}

    	// Se tiver o paramento $id retorna o formulário.
    	return view('usuario.editar',[
    		'usuario' => Usuario::find($id),
    	]);
    }

<<<<<<< HEAD
    public function excluir($id) {
        $usuario = Usuario::find($id);
        if($usuario != null) {
            $usuario->delete();
        }
        
        return redirect('/index');

    }
=======
    public function excluir(){}
>>>>>>> master
}
