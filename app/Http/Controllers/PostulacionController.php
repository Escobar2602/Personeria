<?php

namespace App\Http\Controllers;

use App\Models\Postulacion;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostulacionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'foto' => 'required|image|max:2048',
            'grado' => 'required|string',
        ]);

        $path = $request->file('foto')->store('postulaciones', 'public');

        Postulacion::create([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'foto' => $path,
            'grado' => $validated['grado'],

        ]);

    }

    public function index()
    {
        $postulaciones = Postulacion::all();
        return Inertia::render('Personero/Votar', [
            'postulaciones' => $postulaciones
        ]);
    }
}

