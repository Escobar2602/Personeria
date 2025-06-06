<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PersoneriaController;



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

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
}) ->name('inicio');

 Route::get('/votar', function () {
     return Inertia::render('Personero/Personero');
 }) ->name('votar');

  Route::get('/postulacion', function () {
     return Inertia::render('Personero/Postulacion');
 }) ->name('postulacion');




Route::get('/personeria', [PersoneriaController::class, 'index'])->name('personeria.index');
Route::get('/personeria/tabla', [PersoneriaController::class, 'tabla'])->name('personeria.tabla');
Route::post('/personeria', [PersoneriaController::class, 'store'])->name('personeria.store');


});
