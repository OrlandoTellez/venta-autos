<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view("pages.registro.index");
    }

    public function store(Request $request){
          $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:150'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:100'],
            'telefono' => ['required', 'string', 'max:20'],
            'password' => ['required'],
        ]);

        $usuario = Usuario::create($validated);

        return response()->json([
            'message' => 'Usuario registrado con éxito',
            'usuario' => $usuario
        ], 201);
    }
}