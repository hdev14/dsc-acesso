<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{

    public function index() {

    	$usuarios = Usuario::orderby('nome')->get();

        $tipo_acesso = [
            '100' => 'Compra',
            '010' => 'Venda',
            '001' => 'Produção',
            '110' => 'Compra & Venda',
            '101' => 'Compra & Produção',
            '011' => 'Venda & Produção',
            '111' => 'Acesso Total',
        ];

    	return view('usuario.index', [
    		'usuarios' => $usuarios,
            'tipo_acesso' => $tipo_acesso
    	]);
    }

    public function autenticar(Request $req) {
        
        // Dados recebidos(JSON).
        $dados = $req->json()->all();

        // Verifica se existe as chaves 'login' e 'senha' no Array.
        if (!(array_key_exists('login', $dados) 
            && array_key_exists('senha', $dados)))
            return response()->json(['message' => 'erro'], 400);
       
        // Verificar se o usuário está autenticado.
        // Função para a autenticação do usuário.
        if (!Auth::attempt(['login' => $dados['login'], 
            'password' => $dados['senha'], 'ativo' => 1]))
            return response()->json(['message' => 'erro'], 401);

        // Cria o token.
        $token = Str::random(60);

        // Modifica o token no banco e salva.
        Auth::user()->forceFill([
            'token' => $token,
        ])->save();

        // Retorna o usuário autenticado.
        $usuario = Auth::user();

        // Envia os dados de acordo com a documentação.
        return response()->json([
            'token' => $token,
            'usuario' => [
                'id' => $usuario->id,
                'nome' => $usuario->nome,
                'cpf' => $usuario->cpf,
                'tipo_acesso' => $usuario->tipo_acesso,
            ]
        ], 200);
    }

    public function criar(UsuarioRequest $req) {

        // Validação com o UsuarioRequest.
        $dados_usuario = $req->validated();

        $usuario = new Usuario($dados_usuario['usuarios']);
        $usuario->ativo = 1;
                
        //Criptografia da senha
        $usuario->senha = Hash::make($usuario->senha);
        $usuario->save();

        //Confirmação (Criar na visão)
        $req->session()->flash('message-type','success');
        $req->session()->flash('message','Usuário criado com sucesso!');

        return redirect('/index');
    }

    // Ação para os verbos GET e POST
    public function editar(Request $req, $id = null){
    	
        // Se tiver o paramento $id retorna o formulário.
        if (!is_null($id)) {
            return view('usuario.editar',[
                'usuario' => Usuario::find($id),
            ]);
        }

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
            $req->session()->flash('message-type','danger');
            $req->session()->flash('message','Não foi possível modificar o usuário. Por favor, tente novamente !');
        }

		return redirect('/index');
    }

    public function ativo($id) {

        $usuario = Usuario::find($id);

        if ($usuario != null) {
            $ativo = $usuario->ativo;
            $usuario->ativo = ($ativo == 1) ? 0 : 1;
            $usuario->save();
        }

        return redirect('/index');
    }

    public function getId($id){

        $usuario = Usuario::find($id);

        if ($usuario != null) {
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

    public function verificar($token = null){

        // Verifica se o token é nulo.
        if (is_null($token)) {
            return response()->json([
                'message' => 'erro'
            ], 400);
        }

        // Se não for, procura o usuário com esse token.
        $usuario = Usuario::where('token', $token)->first();

        // Verifica se o usuário é nulo.
        if (is_null($usuario)){
             return response()->json([
                'is_valido' => false,
                'usuario' => null
            ], 200);
        }

        // Adiciona a data e hora do último acesso.
        $usuario->last_access = date("Y-m-d H:i:s");
        $usuario->save();

        // Se não for, retorna o JSON com as informações da documentação.
        return response()->json([
            'is_valido' => true,
            'usuario' => [
                'id' => $usuario->id,
                'nome' => $usuario->nome,
                'cpf' => $usuario->cpf,
                'tipo_acesso' => $usuario->tipo_acesso,
            ]
        ], 200);
    }
}
