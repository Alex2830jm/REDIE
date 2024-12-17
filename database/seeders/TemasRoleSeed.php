<?php

namespace Database\Seeders;

use App\Models\Grupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class TemasRoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allTemas = Grupo::where('grupo_nivel', '4')->get();

        //SuperAdministrador
        Role::findOrFail(1)->temas()->sync($allTemas->pluck('id'));

        //DE - Direccioón de Estadística
        Role::findOrFail(2)->temas()->sync($allTemas->pluck('id'));

        //DEE - Departamento de Estadística Económica
        $temasDEE = $allTemas
            ->filter(function ($tema) {
                return $tema->id === 13 ||
                    $tema->principal->principal->id === 14 &&
                    $tema->id  != 25 ||
                    $tema->principal->principal->id === 32 ||
                    $tema->id === 39;
            });
        Role::findOrFail(3)->temas()->sync($temasDEE->pluck('id'));

        //DES - Departamento de Estadística Social
        $temasDES = $allTemas
            ->filter(function ($tema) {
                return $tema->principal->principal->id === 2 ||
                $tema->id === 25 ||
                $tema->principal->principal->id === 37 &&
                $tema->id != 39;
            });
        Role::findOrFail(4)->temas()->sync($temasDES->pluck('id'));
    }
}
