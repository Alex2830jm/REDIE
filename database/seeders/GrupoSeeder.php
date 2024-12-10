<?php

namespace Database\Seeders;

use App\Models\Grupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grupos = Grupo::insert([
            ['nombreGrupo' => 'Demografía y Sociedad', 
                'colorGrupo' => 'orange'],
            ['nombreGrupo' => 'Economía y Sectores Productivos',
                'colorGrupo' => 'lime'],
            ['nombreGrupo' => 'Geografía y Medio Ambiente', 
                'colorGrupo' => 'teal'],
            ['nombreGrupo' => 'Gobierno, Seguridad y Justicia',
                'colorGrupo' => 'pink'],
        ]);
    }
}
