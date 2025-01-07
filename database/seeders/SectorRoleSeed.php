<?php

namespace Database\Seeders;

use App\Models\Grupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SectorRoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allTemas = Grupo::where('grupo_nivel', '3')->get();

        //SuperAdministrador
        Role::findOrFail(1)->sectores()->sync($allTemas->pluck('id'));

        //DE - Direccioón de Estadística
        Role::findOrFail(2)->sectores()->sync($allTemas->pluck('id'));

        //DEE - Departamento de estadística económica
        $sectoresDEE = $allTemas
            ->filter(function ($sector) {
                return 
                    $sector->id === 12 ||
                    $sector->id === 38 ||

                    $sector->id != 24 &&

                    $sector->padre->id != 2 &&
                    $sector->padre->id != 37;
            });

        Role::findOrFail(3)->sectores()->sync($sectoresDEE->pluck('id'));

        //DES - Departamento de estadística social
        $sectoresDES = $allTemas
            ->filter(function ($sector) {
                return 
                    $sector->id === 24 ||

                    $sector->padre->id != 14 &&
                    $sector->padre->id != 32;
        });

        Role::findOrFail(4)->sectores()->sync($sectoresDES->pluck('id'));
    }
}
