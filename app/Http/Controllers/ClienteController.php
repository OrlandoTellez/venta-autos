<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;



class ClienteController extends Controller
{
    public function index()
    {
        $usuarios = [
            [
                'nombre' => ['primerNombre' => 'Juan', 'primerApellido' => 'Pérez'],
                'direccion' => 'Plaza Mayor 12',
                'ciudad' => 'Managua',
                'telefono' => '123-456',
                'fecha_de_registro' => '2003-02-21',
            ],
            [
                'nombre' => ['primerNombre' => 'Ana', 'primerApellido' => 'Gómez'],
                'direccion' => 'Calle Luna 34',
                'ciudad' => 'Granada',
                'telefono' => '987-654',
                'fecha_de_registro' => '2005-06-15',
            ],
            [
                'nombre' => ['primerNombre' => 'Luis', 'primerApellido' => 'Martínez'],
                'direccion' => 'Avenida Sol 56',
                'ciudad' => 'León',
                'telefono' => '456-789',
                'fecha_de_registro' => '2010-11-30',
            ]
        ];
        return view('pages.clientes.index', [
            'users' => $usuarios,
            'colors' => true
        ]);
    }

    public function destroy(string $nombre)
    {
        // Aquí haces la lógica de borrar usuario con ese email (si es base de datos, etc.)
        return redirect()->back()->with('message', "Usuario $nombre eliminado.");
    }
}