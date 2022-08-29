<?php

namespace Database\Seeders;

use App\Models\Parameter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parameter::insert([
            [
                'nombre' => 'Financiero',
                'bia_process_id' => 1,
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Reputacional',
                'bia_process_id' => 1,
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Legal',
                'bia_process_id' => 1,
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Contractual',
                'bia_process_id' => 1,
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Salud/Ambiente',
                'bia_process_id' => 1,
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
            ]);
    }
}
