<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserRoleController extends Controller
{
    public function asignarRol(Request $request, User $usuario)
    {
        $request->validate([
            'role' => 'required|string'
        ]);

        $usuario->syncRoles([$request->role]);
    }
}
