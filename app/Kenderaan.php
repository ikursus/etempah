<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kenderaan extends Model
{
    // Tetapan nama table yang perlu dihubungi oleh Model Kenderaan ini.
    protected $table = 'kenderaan';
    // Tetapan rekod dari table yang boleh diisi oleh user
    protected $fillable = [
        'jenis',
        'model',
        'no_plat',
        'status',
        'gambar'
    ];
}
