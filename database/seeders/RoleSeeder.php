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
        /* 1 */ $roleSA = Role::create([
            'name' => 'SA',
            'description' => 'Super Administrador'
        ]);

        /* 2 */ $roleDE = Role::create([
            'name' => 'DE',
            'description' => 'Dirección de Estadística'
        ]);

        /* 3 */ $roleDEE = Role::create([
            'name' => 'DEE',
            'description' => 'Departamento de Estadíscitca Económica '
        ]);

        /* 4 */ $roleDES = Role::create([
            'name' => 'DES',
            'description' => 'Departamento de Estadística Social'
        ]);
    }
}
