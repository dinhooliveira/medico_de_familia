<?php

namespace App\Http\Controllers\Medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthControlller extends Controller
{

    public function login(){

        return Inertia::render('Medico/Login');
    }


    public function auth(Request $request): RedirectResponse
    {
        $request->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);

        $auth = Auth::attempt($request->only('email','password'));
        if($auth){
            return redirect()->route('medico.dashboard');
        }

        return redirect()->route('medico.login')->withErrors(['email'=>'Email ou password Invalido!']);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('medico.login');
    }

}
