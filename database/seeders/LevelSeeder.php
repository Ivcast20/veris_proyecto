<?php

namespace Database\Seeders;

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
        Level::insert([
        [
            'name' => 'Bajo',
            'value' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Medio',
            'value' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Alto',
            'value' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ]);
    }
}
