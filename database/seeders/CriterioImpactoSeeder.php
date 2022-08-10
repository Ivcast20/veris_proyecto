<?php

namespace Database\Seeders;

use App\Models\CriterioImpacto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriterioImpactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criterios = [
            [
                'nombre' => 'Legal',
            ],
            [
                'nombre' => 'Reputacional',
            ],
            [
                'nombre' => 'Financiero',
            ],
            [
                'nombre' => 'Contractual',
            ],
            [
                'nombre' => 'Salud/Ambiental'
            ]
        ];
        foreach ($criterios as $criterio) {
            CriterioImpacto::create($criterio);
        }
    }
}
