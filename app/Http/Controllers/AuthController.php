<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Usuario;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function create(): \Illuminate\Contracts\View\View
    {
        # Retornar a tela de cadastro de usuários com os bairros disponiveis no banco
        $bairros = Endereco::all();

        return view('Usuario.cadastro', compact('bairros'));
    }

    public function alert(): \Illuminate\Contracts\View\View
    {
        # Retornar a tela de aviso pós cadastro
        return view('Usuario.aviso');
    }

    public function store(Request $request)
    {
        # Pegar os dados enviados do formulário de cadastro
        # Validar os dados
        // Validação dos dados
         # Se não forem válidos
            # Retornar para o cadastro com uma mensagem de feedback
        # Se forem válidos
            # Cadastrar novo usuário no banco
            # Enviar usuário para a tela de busca de rotas com uma mensagem de feedback

        $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'senha' => 'required',
            'id_endereco' => 'required'
        ]);

        $usuario = new Usuario;

        $usuario->nome = $validatedData['nome'];
        $usuario->email = $validatedData['email'];
        $usuario->senha = $validatedData['senha'];
        $usuario->id_endereco = $validatedData['id_endereco'];

        $usuario->save();
        var_dump($request->all());
        return redirect()->route('auth.alert')->with('success', 'Usuario cadaastrado com sucesso');
    }

    public function login(Request $request): \Illuminate\Contracts\View\View
    {
        # Retornar a tela de login de usuários
        return view("login");
    }

    public function storeLogin(Request $request)
    {
        # Pegar os dados vindos do formulário de login
        # Validar os dados
        # Se não forem válidos
            # Retornar para o login com uma mensagem de feedback
        # Se forem válidos
            # Enviar usuário para a tela de busca de rotas com uma mensagem de feedback
        var_dump($request->all());
    }

    public function logout()
    {
        # Redirecionar o usuário para a tela de login
    }
}
