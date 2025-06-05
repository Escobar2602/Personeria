<?php

namespace App\Http\Controllers;

use App\Models\Personeria;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PersoneriaController extends Controller
{
    public function index() {
        return Inertia::render('Personeria/Index', [
            'registros' => Personeria::all(),
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:personeria',
        ]);

        Personeria::create($request->only('name', 'email'));

        return redirect()->route('personeria.index');
    }
}
