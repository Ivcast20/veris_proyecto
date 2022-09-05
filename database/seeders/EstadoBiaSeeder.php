<?php

namespace Database\Seeders;

use App\Models\EstadoBia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoBiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstadoBia::create([
            'descripcion' => 'Parametrización del BIA'
        ]);
        EstadoBia::create([
            'descripcion' => 'Análisis de Productos y Servicios'
        ]);
        EstadoBia::create([
            'descripcion' => 'Generación de resultados del BIA'
        ]);
    }
}
