<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $permissions = Permission::insert([
            //Dashboard
            ['name' => 'menu.directorio',   'description' => 'Botón del la barra de menú "Directorio de Dependencias"'],
            ['name' => 'menu.usuarios',     'description' => 'Botón del menu desplegable "Usuarios"'],
            ['name' => 'menu.roles',        'description' => 'Botón del menú desplegable "Roles"'],
            ['name' => 'menu.cargaArchivo', 'description' => 'Botón del menú desplegable "Carga de Archivos"'],

            ['name' => 'ce.agregarCE',      'description' => 'Botón para agregar un cuadro estadístico nuevo'],
            ['name' => 'ce.archivos',       'description' => 'Botón para visualizar el historial de archivos del cuadro estadístico'],
            ['name' => 'ce.agregarArchivo', 'description' => 'Botón para abrir el formulario de agregación de archivo'],


            //Directorio
            ['name' => 'directorio.agregar', 'description' => 'Botón para agregar una nueva dependencia'],
            ['name' => 'directorio.detalles', 'description' => 'Botón para ver los detalles de una dependencia'],
            ['name' => 'directorio.editDependencia', 'description' => 'Botón para editar datos de la dependenia'],
            ['name' => 'directorio.editUnidad', 'description' => 'Botón para editar datos de la unidad informativa'],
        ]);


    }
}
