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
     */
    public function run(): void
    {

        //Roles
        $roleSA = Role::create([
            'name' => 'SA',
            'description' => 'Super Administrador'
        ]);

        $roleDE = Role::create([
            'name' => 'DE',
            'description' => 'Dirección de Estadística'
        ]);

        $roleDEE = Role::create([
            'name' => 'DEE',
            'description' => 'Departamento de Estadíscitca Económica '
        ]);

        $roleDES = Role::create([
            'name' => 'DES',
            'description' => 'Departamento de Estadística Social'
        ]);

        //Permisos
        $consultaCE = Permission::create(['name' => 'consultaCE']);
        $cargaCE = Permission::create(['name' => 'cargaCE']);
        $reportesCE = Permission::create(['name' => 'reportesCE']);

        $permissionsSA = [
            $consultaCE,
            $cargaCE,
            $reportesCE
        ];

        $permissionsDE = [
            $consultaCE,
            $reportesCE
        ];

        $permissionsDptos = [
            $consultaCE,
            $cargaCE,
            $reportesCE
        ];


        $roleSA->syncPermissions($permissionsSA);
        $roleDE->syncPermissions($permissionsDE);
        $roleDEE->syncPermissions($permissionsDptos);
        $roleDES->syncPermissions($permissionsDptos);
    }
}
