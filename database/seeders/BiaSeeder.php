<?php

namespace Database\Seeders;

use App\Models\BiaProcess;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BiaProcess::insert([
            [
                'nombre' => 'Bia 2022 CI',
                'alcance' => 'Prestación de servicios de salud, atención médica presencial y/o virtual de servicios como consultas, imágenes, óptica, terapias, odontología, procedimientos, laboratorio clínico y farmacia en Centrales Médicas y Atención Prioritaria, Salud a empresas, dispensarios y chequeos, y servicios a domicilio de tomas de muestra y entrega de medicamentos',
                'fecha_inicio' => Carbon::createFromDate(2022, 5, 30),
                'fecha_fin' => Carbon::createFromDate(2022, 7, 30),
                'estado' => true,
            ],
        ]);
    }
}
