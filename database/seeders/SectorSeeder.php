<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectores = Sector::insert([
            //Grupo 1
            ['nombreSector' => 'Población', 'grupo_id' => '1'],
            ['nombreSector' => 'Vivienda y Urbanización', 'grupo_id' => '1'],

            //Grupo 2
            ['nombreSector' => 'Agropecuario y Pesca','grupo_id' => '2'],
            ['nombreSector' => 'Industria', 'grupo_id' => '2'],
            ['nombreSector' => 'Comercio', 'grupo_id' => '2'],

            //Grupo 3
            ['nombreSector' => 'Aspectos Geográficos y Medio Ambiente', 'grupo_id' => '3'],

            //Grupo 4
            ['nombreSector' => 'Gobierno', 'grupo_id' => '4'],
            ['nombreSector' => 'Seguridad y Justicia', 'grupo_id' => '4'],
        ]);
    }
}
