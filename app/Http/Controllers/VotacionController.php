<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Votacion;

class VotacionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'postulacion_id' => 'required|exists:postulacions,id',
        ]);

        Votacion::create([
            'postulacion_id' => $request->postulacion_id,

        ]);

        return redirect()->back()->with('success', '¡Voto registrado correctamente!');
    }
}
