<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

        $admin = User::create([
            'name' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'ivan20cast@gmail.com',
            'password' => 'Pa$$w0rdV3r1s'
        ])->assignRole('admin');

        $director = User::create([
            'name' => 'Director',
            'lastname' => 'Director',
            'email' => 'ivanfrancisco_20@outlook.com',
            'password' => 'Director123-'])->assignRole('director');

        User::factory(100)->create();
        $this->call(BiaSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(ParameterSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
