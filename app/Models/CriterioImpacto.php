<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriterioImpacto extends Model
{
    use HasFactory;

    protected $table = 'criterio_impactos';

    public function niveles()
    {
        return $this->belongsToMany(Nivel::class,
                                    'criterio_impacto_nivel',
                                    'criterio_impacto_id',
                                    'nivel_id')
                                    ->withTimestamps()
                                    ->withPivot('descripcion');
    }
}
