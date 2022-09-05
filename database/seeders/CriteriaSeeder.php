<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Criteria::create([
            'level_id' => 1,
            'parameter_id' => 1,
            'criterio' => 'No se generan pérdida de ingresos por paralizar el servicio/proceso/actividad.'
        ]);

        Criteria::create([
            'level_id' => 1,
            'parameter_id' => 2,
            'criterio' => 'No hay afectación a la reputación.'
        ]);

        Criteria::create([
            'level_id' => 1,
            'parameter_id' => 3,
            'criterio' => 'No tiene afectación a requisitos legales o regulatorios.'
        ]);

        Criteria::create([
            'level_id' => 1,
            'parameter_id' => 4,
            'criterio' => 'No afecta los requisitos contractuales.'
        ]);

        Criteria::create([
            'level_id' => 1,
            'parameter_id' => 5,
            'criterio' => 'No hay impacto en salud / ambiental'
        ]);
    }
}
