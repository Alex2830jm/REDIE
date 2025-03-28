<?php

namespace Database\Seeders;

use App\Models\DependenciaInformante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleHasDependenciaSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allDependencias = DependenciaInformante::where('nivelDI', '1')->get();

        //Dependencias asignadas al rol de Administrador y DE
        Role::findOrFail(1)->dependencias()->sync($allDependencias->pluck('id'));
        Role::findOrFail(2)->dependencias()->sync($allDependencias->pluck('id'));

        //Dependencias asignadas al rol de DEE
        $dependenciasDEE = $allDependencias->filter(function ($dependencia) {
            return 
                $dependencia->tipoDI == 'Federal' ||
                $dependencia->id == 3 ||
                $dependencia->id == 59 ||
                $dependencia->id == 63 ||
                $dependencia->id == 66 ||
                $dependencia->id == 69 ||
                $dependencia->id == 89 ||
                $dependencia->id == 97 ||
                $dependencia->id == 21;
        });
        Role::findOrFail(3)->dependencias()->sync($dependenciasDEE->pluck('id'));

        $dependenciasDES = $allDependencias->filter(function ($dependencia) {
            return 
                $dependencia->id == 22 ||
                $dependencia->id == 26 ||
                $dependencia->id == 36 ||
                $dependencia->id == 45 ||
                $dependencia->id == 51 ||
                $dependencia->id == 55 ||
                $dependencia->id == 70 ||
                $dependencia->id == 75 ||
                $dependencia->id == 92 ||
                $dependencia->id == 104 ||
                $dependencia->id == 109 ||
                $dependencia->id == 111 ||
                $dependencia->id == 119 ||
                $dependencia->id == 126 ||
                $dependencia->id == 128 ||
                $dependencia->id == 130 ||
                $dependencia->id == 132;
        });
        Role::findOrFail(4)->dependencias()->sync($dependenciasDES->pluck('id'));

    }
}
