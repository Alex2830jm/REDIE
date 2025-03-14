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
        Role::find(1)->syncPermissions($allPermissions->pluck('id'));

        //Permisos Rol DE
        Role::find(2)->syncPermissions($allPermissions->pluck('id'));

        //Permisos Rol DES

        $allPermissions = Permission::all();

        $permissions = $allPermissions->filter(function($permission) {
            return 
                substr($permission->name, 0, 20) != "inicio.UsuariosIndex" &&
                substr($permission->name, 0, 17) != "inicio.RolesIndex" &&
                substr($permission->name, 0, 20) != "inicio.AgregarCuadro" &&
                substr($permission->name, 0, 11) != "directorio." ||
                substr($permission->name, 0, 21) === "directorio.showDI";
        });

        Role::find(3)->syncPermissions($permissions->pluck('id'));
        Role::find(4)->syncPermissions($permissions->pluck('id'));
    }
}
