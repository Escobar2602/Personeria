<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Postulacion;
use App\Http\Controllers\UsuarioController;

use App\Http\Controllers\PostulacionController;
use App\Http\Controllers\VotacionController;
use App\Http\Controllers\UserRoleController;

//manejo de roles en la tabla
Route::post('/usuarios/{usuario}/asignar-rol', [UserRoleController::class, 'asignarRol'])->name('asignarRol');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');



    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });

    // Route::get('/postulacion', function () {
    //     return Inertia::render('Personero/Postulacion');
    // })->name('postulacion');
    Route::get('/postulacion', function () {
    return Inertia::render('Personero/Postulacion');
})->name('postulacion');


    // Route::get('/votar', function () {
    //     return Inertia::render('Personero/Votar');
    // })->name('votar');
    Route::post('/votar', [PostulacionController::class, 'store'])->name('votar.store');
    Route::get('/votar', [PostulacionController::class, 'index'])->name('votar');

// Route::post('/postulacion', [PostulacionController::class, 'store'])->name('postulacion.store');
    Route::post( '/postulacion', [PostulacionController::class, 'store'])->name('postulacion.store');



// Route::get('/votar', function () {
//     $postulaciones = Postulacion::all();
//     return Inertia::render('Personero/Votar', [
//         'postulaciones' => $postulaciones
//     ]);
// })->name('votar');



    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard1');



    Route::get('/inicio', function () {
        return Inertia::render('Inicio');
    })->name('inicio');



    //para que guarde
    Route::post('votar3' , [VotacionController::class, 'store'])->name('votar3');

});
