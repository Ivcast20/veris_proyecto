<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiaProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'alcance',
        'fecha_inicio',
        'fecha_fin',
        'estado',
    ];

    // protected $casts = [
    //     'fecha_inicio' => 'date',
    //     'fecha_fin' => 'date',
    // ];

    protected $casts = ['estado' => 'boolean'];
}
