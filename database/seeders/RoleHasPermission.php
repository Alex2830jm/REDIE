<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allPermissions = Permission::all();

        //Permisos Rol Admin
        Role::findOrFile(1)->syncPermissions($allPermissions->pluck('id'));

        //Permisos Rol DE
        Role::findOrFile(2)->syncPermissions($allPermissions->pluck('id'));

        //Permisos Rol DES
        $permissions = $allPermissions->filter(function($permission) {
            return 
                substr($permission->name, 0, 15) != "inicio_RolesIndex" &&
                substr($permission->name, 0, 20) != "inicio_UsuariosIndex" &&
                substr($permission->name, 0, 20) != "inicio_AgregarCuadro";
        });

        Role::findOrFile(3)->syncPermissions($permissions->pluck('id'));
        Role::findOrFile(4)->syncPermissions($permissions->pluck('id'));
    }
}
