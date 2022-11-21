<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;
    protected $fillable = [
        'alumno_id',
        'inicio',
        'codigo_cer',
        'final',
        'codigo_cur',
        // 'image',

    ];
    public function certificadoImages()
    {
        return $this->hasMany(CertificadoImage::class, 'cer_id', 'id');
    }
}
