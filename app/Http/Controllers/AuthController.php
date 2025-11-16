<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;
use Nette\Schema\ValidationException;

session_start();

class AuthController extends Controller
{
    public function home() :View {
        return view('home');
    }

    public function login() :View {
        return view('auth.login');
    }

    public function loginSubmtit(Request $request) {
        // validacao
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ], [
                'email.required' => 'O campo email é obrigatório.',
                'email.email' => 'Insira um email válido.',
                'password.required' => 'O campo senha é obrigatório.',
            ]);

            // autenticação das informacoes
            $buscaUsuario = Schema::hasTable('users') ? User::where('email', $request->email)->first() : null;

            if(!$buscaUsuario || !password_verify($request->password, $buscaUsuario->password)) {
                return redirect()->back()->withErrors('Email ou senha inválidos.')->withInput();
            }

            // redirecionar para a dashboard
            $request->session()->put('user', $buscaUsuario);
            $request->session()->put('user_id', $buscaUsuario->id);
            // dd($request->session()->all());
            return redirect()->route('user.dashboard');

        }catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

    }

    public function register() :View{
        return view('auth.register');
    }

    public function registerSubmit(Request $request) {
        // validacao
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
            ], [
                'name.required' => 'O campo nome é obrigatório.',
                'email.required' => 'O campo email é obrigatório.',
                'email.email' => 'Insira um email válido.',
                'email.unique' => 'Este email já está em uso.',
                'password.required' => 'O campo senha é obrigatório.',
                'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
                'password.confirmed' => 'As senhas não coincidem.',
            ]);

            // dd($request->all());

            // criar usuario
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);


            // redirecionar para a tela de login
            return redirect()->route('login')->with('success', 'Registro realizado com sucesso. Faça login para continuar.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function logout() {
        session_unset();
        session_destroy();

        return redirect()->route('home');
    }

}
