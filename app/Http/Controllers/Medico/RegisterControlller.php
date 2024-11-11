<?php

namespace App\Http\Controllers\Medico;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RegisterControlller extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Medico/Register');
    }

    public function store(Request $request){

       $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
       ]);

       $user = User::create($request->all());
       event(new Registered($user));

       return redirect()->route('medico.login')->with('success', 'Cadastrado com sucesso');
    }

}
