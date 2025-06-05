<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personeria extends Model
{
    protected $table = 'personeria';

    protected $fillable = ['name', 'email', 'apellido', 'curso', 'profesion','sexo','telefono'];
}
