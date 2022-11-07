<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificadoImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'cer_id',
        'image'
    ];
}
