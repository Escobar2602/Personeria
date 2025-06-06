<?php

namespace App\Http\Controllers;

use App\Models\Personeria;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PersoneriaController extends Controller
{
    public function index() {
        return Inertia::render('Personeria/Index');
    }
    public function tabla() {
        $personas = Personeria::all();
        return Inertia::render('Personeria/Tabla', [
            'registros' => $personas
        ]);
    }


    

    public function store(Request $request) {
        $data= $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:personeria',
            'apellido' => 'string',
            'curso' => 'required|numeric',
            'profesion' => 'required|string',
            'sexo' => 'string',
            'telefono' => 'nullable|numeric',

        ]);

        Personeria::create( $data);

        // return redirect()->route('personeria.tabla');
    }
}
