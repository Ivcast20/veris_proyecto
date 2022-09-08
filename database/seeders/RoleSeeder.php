<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
//use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $director = Role::create(['name' => 'Director']);
        $comite = Role::create(['name' => 'Comite']);

        //Permission::create(['name' => 'ver dashboard'])->syncRoles([$admin, $director]);

        //Permisos para gestionar usuarios
        Permission::create([
            'name' => 'admin.users.index',
            'description' => 'Ver usuarios'
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.users.edit',
            'description' => 'Editar usuarios'
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.users.destroy',
            'description' => 'Eliminar usuarios'
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.users.create',
            'description' => 'Crear usuarios'
        ])->syncRoles([$admin, $director]);

        //Permisos para gestionar roles
        Permission::create([
            'name' => 'admin.roles.index',
            'description' => 'Ver roles'
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.roles.create',
            'description' => 'Crear rol'
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.roles.edit',
            'description' => 'Editar rol'
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.roles.destroy',
            'description' => 'Eliminar rol'
        ])->syncRoles([$admin, $director]);

        //Permisos para gestionar el Bia
        Permission::create([
            'name' => 'admin.bia_process.index',
            'description' => 'Ver BIAs (Administrador)' 
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.bia_process.create',
            'description' => 'Crear BIA' 
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.bia_process.edit',
            'description' => 'Editar BIA'
        ])->syncRoles([$admin, $director]);

        //Permisos para gestionar categorías de productos
        Permission::create([
            'name' => 'admin.categories.index',
            'description' => 'Ver categorías',
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.categories.create',
            'description' => 'Crear categoría'
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.categories.edit',
            'description' => 'Editar categoría'
        ])->syncRoles([$admin, $director]);

        //Permisos para gestionar niveles
        Permission::create([
            'name' => 'admin.levels.index',
            'description' => 'Ver niveles',
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.levels.create',
            'description' => 'Crear nivel'
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.levels.edit',
            'description' => 'Editar nivel'
        ])->syncRoles([$admin, $director]);

        //Permisos para gestionar parámetros
        Permission::create([
            'name' => 'admin.parameters.index',
            'description' => 'Ver parametros',
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.parameters.create',
            'description' => 'Crear parametro'
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.parameters.edit',
            'description' => 'Editar parametro'
        ])->syncRoles([$admin, $director]);

        //Permisos para gestionar criterios
        Permission::create([
            'name' => 'admin.criterias.index',
            'description' => 'Ver criterios',
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.criterias.create',
            'description' => 'Crear criterio'
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.criterias.edit',
            'description' => 'Editar criterio'
        ])->syncRoles([$admin, $director]);

        //Permisos para gestionar productos/servicios
        Permission::create([
            'name' => 'admin.products.index',
            'description' => 'Ver productos/servicios',
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.products.create',
            'description' => 'Crear producto/servicio'
        ])->syncRoles([$admin, $director]);
        Permission::create([
            'name' => 'admin.products.edit',
            'description' => 'Editar producto/servicio'
        ])->syncRoles([$admin, $director]);

    }
}
