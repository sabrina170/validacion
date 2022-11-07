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
        'mod_user',
        'tipo_mod'
    ];


    // public function alumnoImages()
    // {
    //     return $this->hasMany(AlumnoImage::class, 'alumno_id', 'id');
    // }
}
