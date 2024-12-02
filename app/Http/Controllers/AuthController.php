<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'cpf' => 'required|digits:11',
            'password' => 'required|min:6',
        ]);

        $user = DB::table('usuario')->where('CPF', $request->cpf)->first();

        if ($user && $user->Senha === $request->password) {
            session(['user' => $user]);

            return redirect('/');
        }

        return back()->withErrors([
            'cpf' => 'CPF ou senha inválidos.',
        ]);
    }

    public function logout()
    {
        session()->forget('user');

        return redirect()->route('login.form');
    }
}
