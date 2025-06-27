<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votacion extends Model
{
    use HasFactory;

    protected $fillable = ['postulacion_id', 'user_id'];
    
    public function postulacion()
    {
        return $this->belongsTo(Postulacion::class);
    }
}
