<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nombre' => 'Atención Médica Presencial',
            'estado' => true,
        ]);

        Category::create([
            'nombre' => 'Salud a Empresas',
            'estado' => true,
        ]);

        Category::create([
            'nombre' => 'Atención Médica Virtual',
            'estado' => true,
        ]);
    }
}
