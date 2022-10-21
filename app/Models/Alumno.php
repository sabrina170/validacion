<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'codigo_cer',
        'inicio',
        'final',
        'image',
        'codigo_cur'
    ];
}
