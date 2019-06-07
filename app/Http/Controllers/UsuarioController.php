<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsuarioRequest;


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

    public function criar(UsuarioRequest $req) {
        //Validação básica, pode ser melhorada depois se precisar
        /*$req->validate([
            'usuarios.login' => 'max:50|required|unique:usuarios,login',
            'usuarios.senha' => 'max:60|same:confirmSenha|required',
            'usuarios.nome' => 'max:200|required',
            'usuarios.cpf' => 'min:11|max:11|string|required|unique:usuarios,cpf',
            'usuarios.tipo_acesso' => 'min:3|max:3|required'
        ]);*/
        // Validação com o UsuarioRequest.
        $dados_usuario = $req->validated();

        $usuario = new Usuario($dados_usuario);
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
            // Validação personalizada para ação Editar.
            $dados_validados = $req->validate([
                'usuarios.login' => 'max:50|required',
                'usuarios.senha' => 'max:60|same:confirmSenha|required',
                'usuarios.nome' => 'max:200|required',
                'usuarios.cpf' => 'min:11|max:11|string|required',
                'usuarios.tipo_acesso' => 'min:3|max:3|required'
            ]);

    		$usuario = Usuario::find($req->usuarios['id']);

            // Faz o update com o array dos dados validados.
    		$update = $usuario->update($dados_validados['usuarios']);

    		if ($update) {
                $req->session()->flash('message-type','success');
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

    public function getId($id){
        $usuario = Usuario::find($id);
        if($usuario != null) {
           return response()->json([
            'id' => $usuario->id,
            'nome' => $usuario->nome,
            'cpf' => $usuario->cpf,
            'ativo'=> $usuario->ativo,
            'tipo_acesso'=> $usuario->tipo_acesso,
           ], 200);
        }
        else {
            return response()->json(['message' => 'erro'], 400);
       }
    }
}
