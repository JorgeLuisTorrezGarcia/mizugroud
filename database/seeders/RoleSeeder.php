<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'SuperAdmin']);
        $role2 = Role::create(['name'=>'Cliente']);

        Permission::create(['name'=>'users.index','description'=>'Ver lista de usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'users.edit','description'=>'Asignar un Rol'])->syncRoles([$role1]);

        Permission::create(['name'=>'categorias.index','description'=>'Ver lista de categorias'])->syncRoles([$role1]);
        Permission::create(['name'=>'categorias.create','description'=>'Agregar una categoria'])->syncRoles([$role1]);
        Permission::create(['name'=>'categorias.edit','description'=>'Editar una categoria'])->syncRoles([$role1]);
        Permission::create(['name'=>'categorias.destroy','description'=>'Eliminar una categoria'])->syncRoles([$role1]);

        Permission::create(['name'=>'horarios.index','description'=>'Ver lista de horarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'horarios.create','description'=>'Agregar un horario'])->syncRoles([$role1]);
        Permission::create(['name'=>'horarios.edit','description'=>'Editar un horario'])->syncRoles([$role1]);
        Permission::create(['name'=>'horarios.destroy','description'=>'Eliminar un horario'])->syncRoles([$role1]);

        Permission::create(['name'=>'peliculas.index','description'=>'Ver lista de peliculas'])->syncRoles([$role1]);
        Permission::create(['name'=>'peliculas.create','description'=>'Agregar una pelicula'])->syncRoles([$role1]);
        Permission::create(['name'=>'peliculas.edit','description'=>'Editar una pelicula'])->syncRoles([$role1]);
        Permission::create(['name'=>'peliculas.destroy','description'=>'Elimina una pelicula'])->syncRoles([$role1]);

        Permission::create(['name'=>'clientes.index','description'=>'Ver lista de clientes'])->syncRoles([$role1]);
        Permission::create(['name'=>'clientes.create','description'=>'Agregar un cliente'])->syncRoles([$role1]);
        Permission::create(['name'=>'clientes.edit','description'=>'Editar un cliente'])->syncRoles([$role1]);
        Permission::create(['name'=>'clientes.destroy','description'=>'Eliminar un cliente'])->syncRoles([$role1]);

        Permission::create(['name'=>'ventas.index','description'=>'Ver lista de ventas'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'ventas.create','description'=>'Realizar una venta'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'ventas.destroy','description'=>'Eliminar una Venta'])->syncRoles([$role1]);
        
        Permission::create(['name'=>'roles.index','description'=>'Ver lista de roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'roles.create','description'=>'Agregar un rol'])->syncRoles([$role1]);
        Permission::create(['name'=>'roles.edit','description'=>'Editar un rol'])->syncRoles([$role1]);
        Permission::create(['name'=>'roles.destroy','description'=>'Eliminar un rol'])->syncRoles([$role1]);

        Permission::create(['name'=>'bitacoras.index','description'=>'Ver bitacora'])->syncRoles([$role1]);
        
    }
}
