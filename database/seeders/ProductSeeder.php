<?php

namespace Database\Seeders;

use App\Models\ProductService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Atención Médica Presencial
        ProductService::insert([
            [
                'nombre' => 'Consultas',
                'bia_process_id' => 1,
                'category_id' => 1,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Urgencias',
                'bia_process_id' => 1,
                'category_id' => 1,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Laboratorio Clínico',
                'bia_process_id' => 1,
                'category_id' => 1,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Servicio de Imágenes',
                'bia_process_id' => 1,
                'category_id' => 1,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Farmacias',
                'bia_process_id' => 1,
                'category_id' => 1,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Terapias',
                'bia_process_id' => 1,
                'category_id' => 1,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Procedimientos',
                'bia_process_id' => 1,
                'category_id' => 1,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Odontología',
                'bia_process_id' => 1,
                'category_id' => 1,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Óptica',
                'bia_process_id' => 1,
                'category_id' => 1,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        //Servicio de Salud a Empresas
        ProductService::insert([
            [
                'nombre' => 'Chequeos',
                'bia_process_id' => 1,
                'category_id' => 2,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'B2B',
                'bia_process_id' => 1,
                'category_id' => 2,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Dispensarios',
                'bia_process_id' => 1,
                'category_id' => 2,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        ProductService::insert([
            [
                'nombre' => 'Consultas',
                'bia_process_id' => 1,
                'category_id' => 3,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Laboratorio Clínico (Domicilio - Toma de Muestras)',
                'bia_process_id' => 1,
                'category_id' => 3,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Farmacias a Domicilio',
                'bia_process_id' => 1,
                'category_id' => 3,
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);


    }
}
