<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $usuarios = [
            [
                'email' => 'juan@mail.com',
                'name' => ['first' => 'Juan', 'last' => 'Pérez'],
                'phone' => '123-456',
                'location' => ['country' => 'Nicaragua'],
                'dob' => ['age' => 25],
                'picture' => ['thumbnail' => 'https://randomuser.me/api/portraits/thumb/men/1.jpg'],
            ],
        ];
        return view('pages.dashboard.index', [
            'users' => $usuarios,
            'colors' => true
        ]);
    }

    public function destroy(string $email)
    {
        // Aquí haces la lógica de borrar usuario con ese email (si es base de datos, etc.)
        return redirect()->back()->with('message', "Usuario $email eliminado.");
    }
}