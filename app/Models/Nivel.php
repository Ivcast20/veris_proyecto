<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $table = 'niveles';

    protected $fillable = [
        'valor',
        'nombre',
    ];

    public function criteriosImpacto()
    {
        return $this->belongsToMany(CriterioImpacto::class,
                                    'criterio_impacto_nivel',
                                    'nivel_id',
                                    'criterio_impacto_id')
                                    ->withTimestamps()
                                    ->withPivot('descripcion');
    }
}
