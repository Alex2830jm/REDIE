<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            //Permisos en página "Inicio"
            ['name' => 'inicio_DirectorioIndex',    'description' => 'Botón "Botón "Directorio de Dependencias"' ],
            ['name' => 'inicio_RolesIndex',         'description' => 'Botón "Roles"' ],
            ['name' => 'inicio_UsuariosIndex',      'description' => 'Botón "Usuarios"'],
            ['name' => 'inicio_CargaArchivos',      'description' => 'Botón "Carga de Archivos"'],
            ['name' => 'inicio_AgregarCuadro',      'description' => 'Botón "Agrega Cuadro Estadístico"'],
            ['name' => 'inicio_Archivos',           'description' => 'Botón "Archivos"'],
            ['name' => 'inicio_SubirArchivo',       'description' => 'Botón "Subir Archivo"'],
        ];

        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission["name"],
                'description' => $permission["description"]
            ]);
        }
    }
}
