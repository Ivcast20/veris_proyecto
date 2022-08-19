<?php

namespace Database\Seeders;

use App\Models\BiaProcess;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'alcance' => 'Alcance del proceso BIA 1',
                'fecha_inicio' => Carbon::createFromDate(2022, 5, 30),
                'fecha_fin' => Carbon::createFromDate(2022, 7, 30),
                'estado' => true,
            ],
            [
                'nombre' => 'Bia 2022 CII',
                'alcance' => 'Alcance del proceso BIA 2',
                'fecha_inicio' => Carbon::createFromDate(2022, 9, 1),
                'fecha_fin' => Carbon::createFromDate(2022, 11, 15),
                'estado' => true,
            ]
        ]);
    }
}
