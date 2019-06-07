<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{

    public function index() {
    	// Depois colocar uma ordenação.
    	$usuarios = Usuario::all();

    	return view('usuario.index', [
    		'usuarios' => $usuarios,
    	]);
    }

    public function autenticar(Request $req) {}

    public function criar(Request $req) {
        //Validação básica, pode ser melhorada depois se precisar
        $req->validate([
            'usuarios.login' => 'max:50|required|unique:usuarios,login',
            'usuarios.senha' => 'max:60|same:confirmSenha|required',
            'usuarios.nome' => 'max:200|required',
            'usuarios.cpf' => 'min:11|max:11|string|required|unique:usuarios,cpf',
            'usuarios.tipo_acesso' => 'min:3|max:3|required'
        ]);

        $usuario = new Usuario($req->usuarios);
        $usuario->ativo = 1;
                
        //Criptografia da senha
        $usuario->senha = Hash::make($usuario->senha);
        $usuario->save();

        //Confirmação (Criar na visão)
        $req->session()->flash('message-type','alert-success');
        $req->session()->flash('message','Usuário criado com sucesso!');

        return redirect('/index');
    }


    public function editar(Request $req, $id = null){
    	
    	if(is_null($id)) {
            $dados = $req->usuarios;

    		$usuario = Usuario::find($dados['id']);

    		$update = $usuario->update([
    			'login' => $dados['login'],
    			'senha' => $dados['senha'],
    			'nome' => $dados['nome'],
    			'cpf' => $dados['cpf'],
    			'tipo_acesso' => $dados['tipo_acesso'],
    		]);

    		if ($update) {
                $req->session()->flash('message-type','alert-success');
                $req->session()->flash('message','Usuário modificado com sucesso!');
    		} else {
                $req->session()->flash('message-type','alert-danger');
                $req->session()->flash('message','Não foi possível modificar o usuário. Por favor, tente novamente !');
            }

    		return redirect('/index');
    	}

    	// Se tiver o paramento $id retorna o formulário.
    	return view('usuario.editar',[
    		'usuario' => Usuario::find($id),
    	]);
    }

    public function ativo($id) {
        $usuario = Usuario::find($id);
        if($usuario != null) {
            $ativo = $usuario->ativo;
            $usuario->ativo = ($ativo == 1) ? 0 : 1;
            $usuario->save();
        }
        return redirect('/index');
    }

    public function excluir($id) {
        $usuario = Usuario::find($id);
        if($usuario != null) {
            $usuario->ativo = 0;
        }
        
        return redirect('/index');
    }
}
