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
            ['name' => 'inicio.DirectorioIndex',    'description' => 'Botón "Botón "Directorio de Dependencias"'],
            ['name' => 'inicio.RolesIndex',         'description' => 'Botón "Roles"'],
            ['name' => 'inicio.UsuariosIndex',      'description' => 'Botón "Usuarios"'],
            ['name' => 'inicio.CargaArchivos',      'description' => 'Botón "Carga de Archivos"'],

            ['name' => 'inicio.AgregarCuadro',      'description' => 'Botón "Agrega Cuadro Estadístico"'],
            ['name' => 'inicio.Archivos',           'description' => 'Botón "Archivos" que muestra todos los archivos del cuadro estadistico'],
            ['name' => 'inicio.AgregarArchivo',     'description' => 'Botón "Agregar Archivo al Historial" que muestra el formulario para agregar un archivo al cuadro estadistico'],
            ['name' => 'inicio.SubirArchivo',       'description' => 'Botón "Subir Archivo" que guarda el archivo'],
            ['name' => 'inicio.verArchivo',         'description' => 'Botón "Ver" para ver el contenido de un archivo seleccionado'],
            ['name' => 'inicio.descargarArchivo',   'description' => 'Botón "Descargar" para descargar el archivo seleccionado'],

            //Permiso en página "Directorio de Dependencias"
            ['name' => 'directorio.agregarDI',        'description' => 'Botón "Agregar Dependencia" para agregar una nueva dependencia'],
            ['name' => 'directorio.storeDI',           'description' => 'Permite los datos cuando se agrega una dependencia informativa'],
            ['name' => 'directorio.updateDI',      'description' => 'Botón "Guardar cambios de información" que permite guardar los cambios realizados a la información de la dependencia o unidad'],
            ['name' => 'directorio.agregarUI',           'description' => 'Botón "Agregar Unidad Informativa" que permite agregar una unidad informativa a la dependencia informativa seleccionada'],
            ['name' => 'directorio.storeUI',           'description' => 'Permite los datos cuando se agrega una dependencia informativa'],
            ['name' => 'directorio.showDI',     'description' => 'Botón que permite ver los detalles de una dependencia informativa'],
            ['name' => 'directorio.editDI',         'description' => 'Botón "Editar Datos de Dependencia" que muestra los datos de la dependencia o unidad seleccionada en un formulario para poder editarlos'],

            ['name' => 'directorio.editInformante', 'description' => 'Botón "Editar Datos de Informante" que muestra los datos del informante seleccionado en un formulario para poder editarlos'],
            ['name' => 'directorio.updateI',      'description' => 'Botón "Guardar cambios de información" que permite guardar los cambios realizados a la información del informante'],
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission["name"],
                'description' => $permission["description"]
            ]);
        }
    }
}
