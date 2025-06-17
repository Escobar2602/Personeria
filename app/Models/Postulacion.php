<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'foto'];
    protected $table = 'postulacions';
    public function index()
{
    $postulaciones = Postulacion::all();
    return inertia('Personero/Votar', [
        'postulaciones' => $postulaciones
    ]);
}


}
