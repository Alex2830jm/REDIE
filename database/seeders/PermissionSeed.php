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

            //Permisos para el apartado de "Cuadros Estadisticos"
            ['name' => 'ce.listGrupos', 'description' => 'Se permite ver los grupos de información'],
            ['name' => 'ce.listTemas', 'description' => 'Se permite ver los temas de información'],
            ['name' => 'ce.listCE', 'description' => 'Se permite ver los cuadros estadísticos'],
            ['name' => 'ce.listCEPaginate', 'description' => 'Se permite ver los cuadros estadísticos de menara paginada'],
            ['name' => 'ce.agrearCE', 'description' => 'Botón "Agregar Cuadro Estadístico" que muestra el formulario para registrar un cuadro estadístico'],
            ['name' => 'ce.storeCE', 'description' => 'Pemite guardar la información del cuadro estadístico a registrar'],
            ['name' => 'ce.listArchivos', 'description' => 'Botón "Ver Archivos" que permite visualizar el historial de archivos del cuadro estadístico'],
            ['name' => 'ce.agregarFile', 'description' => 'Botón "Agregar Archivo al Historial" que muestra el formulario para agregar un archivo al historial'],
            ['name' => 'ce.saveFile', 'description' => 'Botón "Subir Archivo al Historial" que permite guardar el archivo que se desea agregar'],
            ['name' => 'ce.viewFile', 'description' => 'Botón "Ver" que permite visualizar el archivo seleccionado'],
            ['name' => 'ce.downloadFileCE', 'description' => 'Botón "Descargar" que permite descargar el archivo seleccionado'],

            /* ['name' => '', 'description' => ''],
            ['name' => '', 'description' => ''], */

            //Permiso para el apartado de "Directorio de Dependencias"
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
