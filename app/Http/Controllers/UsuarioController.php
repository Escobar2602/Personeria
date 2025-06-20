<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return Inertia::render('Usuarios/Index', [
            'usuarios' => $usuarios
        ]);
    }
}
