<?php

namespace Database\Seeders;

use App\Models\BiaProcess;
use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $procesosBia = BiaProcess::all();

        foreach($procesosBia as $proceso)
        {
            Level::insert([
                [
                    'nombre' => 'Bajo',
                    'valor' => 1,
                    'bia_process_id' => $proceso->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'estado' => true
                ],
                [
                    'nombre' => 'Medio',
                    'valor' => 2,
                    'bia_process_id' => $proceso->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'estado' => true
                ],
                [
                    'nombre' => 'Alto',
                    'valor' => 3,
                    'bia_process_id' => $proceso->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'estado' => true
                ]
                ]);
        }
    }
}
