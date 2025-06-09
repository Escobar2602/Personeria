<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulacion;

class PostulacionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'foto' => 'nullable|image|max:2048',
            'nombre' => 'required|string|max:255',
            'grado' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('postulaciones', 'public');
        }

        Postulacion::create($data);

        return redirect()->back()->with('success', 'Postulación registrada exitosamente.');
    }
}
