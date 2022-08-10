<?php

namespace Database\Seeders;

use App\Models\Nivel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveles = [
            [
                'valor' => 1,
                'nombre' => 'Bajo',
            ],
            [
                'valor' => 2,
                'nombre' => 'Medio',
            ],
            [
                'valor' => 3,
                'nombre' => 'Alto',
            ],
        ];
        foreach ($niveles as $nivel) {
            Nivel::create($nivel);
        }
    }
}
