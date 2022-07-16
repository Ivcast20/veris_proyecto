<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $director = Role::create(['name' => 'director']);

        Permission::create(['name' => 'ver dashboard'])->syncRoles([$admin, $director]);
        Permission::create(['name' => 'ver usuarios'])->syncRoles([$admin, $director]);
        Permission::create(['name' => 'editar usuarios'])->syncRoles([$admin, $director]);
        Permission::create(['name' => 'eliminar usuarios'])->syncRoles([$admin]);
        Permission::create(['name' => 'crear usuarios'])->syncRoles([$admin, $director]);
        
    }
}
