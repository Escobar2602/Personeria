<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'foto','grado'];
    protected $table = 'postulacions';

    public function votacion(){

        return $this ->hasMany(Votacion::class);

    }


}
