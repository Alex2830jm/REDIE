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
        $gruposGenera = Grupo::insert([
            //General
            /* 1 */ ['nombreGrupo' => 'Repositorio Digital de Información Estadística', 'colorGrupo' => 'N.A', 'grupo_padre' => '0', 'grupo_nivel' => '1'],

        ]);

        $grupo1 = Grupo::insert([
            //Grupo 1 con sectores y temas
            /* 2 */ ['numGrupo' => '1', 'nombreGrupo' => 'Demografía y Sociedad', 'colorGrupo' => 'orange', 'grupo_padre' => '1', 'grupo_nivel' => '2'],

            /* 3 */ ['numGrupo' => '2', 'nombreGrupo' => 'Población', 'colorGrupo' => 'N.A', 'grupo_padre' => '2', 'grupo_nivel' => '3'],
            /* 4 */ ['numGrupo' => '2.1', 'nombreGrupo' => 'Hechos Vitales', 'colorGrupo' => 'N.A', 'grupo_padre' => '3', 'grupo_nivel' => '4'],
            
            /* 5 */ ['numGrupo' => '4', 'nombreGrupo' => 'Educación, Ciencia y Tecnología', 'colorGrupo' => 'N.A', 'grupo_padre' => '2', 'grupo_nivel' => '3'],
            /* 6 */ ['numGrupo' => '4.1', 'nombreGrupo' => 'Educación', 'colorGrupo' => 'N.A', 'grupo_padre' => '5', 'grupo_nivel' => '4'],
            /* 7 */ ['numGrupo' => '4.2', 'nombreGrupo' => 'Cultura y Deporte', 'colorGrupo' => 'N.A', 'grupo_padre' => '5', 'grupo_nivel' => '4'],

            /* 8 */ ['numGrupo' => '5', 'nombreGrupo' => 'Salud y Seguridad Social', 'colorGrupo' => 'N.A', 'grupo_padre' => '2', 'grupo_nivel' => '3'],
            /* 9 */ ['numGrupo' => '5.1', 'nombreGrupo' => 'Salud', 'colorGrupo' => 'N.A', 'grupo_padre' => '8', 'grupo_nivel' => '4'],

            /* 10 */ ['numGrupo' => '8', 'nombreGrupo' => 'Trabajo', 'colorGrupo' => 'N.A', 'grupo_padre' => '2', 'grupo_nivel' => '3'],
            /* 11 */ ['numGrupo' => '8.1', 'nombreGrupo' => 'Trabajo', 'colorGrupo' => 'N.A', 'grupo_padre' => '10', 'grupo_nivel' => '4'],
        ]);

        $grupo2 = Grupo::insert([
            //Grupo 2 con sectores y temas
            /* 12 */ ['numGrupo' => '2', 'nombreGrupo' => 'Economía y Sectores Productivos', 'colorGrupo' => 'sky', 'grupo_padre' => '1', 'grupo_nivel' => '2'],

            /* 13 */ ['numGrupo' => '9', 'nombreGrupo' => 'Agropecuario y Pesca', 'colorGrupo' => 'N.A', 'grupo_padre' => '12', 'grupo_nivel' => '3'],
            /* 14 */ ['numGrupo' => '9.1', 'nombreGrupo' => 'Agricultura', 'colorGrupo' => 'N.A', 'grupo_padre' => '13', 'grupo_nivel' => '4'],
            /* 15 */ ['numGrupo' => '9.2', 'nombreGrupo' => 'Ganadería', 'colorGrupo' => 'N.A', 'grupo_padre' => '13', 'grupo_nivel' => '4'],
            /* 16 */ ['numGrupo' => '9.3', 'nombreGrupo' => 'Pesca', 'colorGrupo' => 'N.A', 'grupo_padre' => '13', 'grupo_nivel' => '4'],

            /* 17 */ ['numGrupo' => '10', 'nombreGrupo' => 'Industria', 'colorGrupo' => 'N.A', 'grupo_padre' => '12', 'grupo_nivel' => '3'],
            /* 18 */ ['numGrupo' => '10.1', 'nombreGrupo' => 'Energía Eléctrica', 'colorGrupo' => 'N.A', 'grupo_padre' => '17', 'grupo_nivel' => '4'],
            /* 19 */ ['numGrupo' => '10.2', 'nombreGrupo' => 'Minería', 'colorGrupo' => 'N.A', 'grupo_padre' => '17', 'grupo_nivel' => '4'],

            /* 20 */ ['numGrupo' => '11', 'nombreGrupo' => 'Comercio', 'colorGrupo' => 'N.A', 'grupo_padre' => '12', 'grupo_nivel' => '3'],
            /* 21 */ ['numGrupo' => '11.1', 'nombreGrupo' => 'Comercio', 'colorGrupo' => 'N.A', 'grupo_padre' => '20', 'grupo_nivel' => '4'],

            /* 22 */ ['numGrupo' => '12', 'nombreGrupo' => 'Turismo', 'colorGrupo' => 'N.A', 'grupo_padre' => '12', 'grupo_nivel' => '3'],
            /* 23 */ ['numGrupo' => '12.1', 'nombreGrupo' => 'Turismo', 'colorGrupo' => 'N.A', 'grupo_padre' => '22', 'grupo_nivel' => '4'],

            /* 24 */ ['numGrupo' => '13', 'nombreGrupo' => 'Transporte', 'colorGrupo' => 'N.A', 'grupo_padre' => '12', 'grupo_nivel' => '3'],
            /* 25 */ ['numGrupo' => '13.1', 'nombreGrupo' => 'Transporte', 'colorGrupo' => 'N.A', 'grupo_padre' => '24', 'grupo_nivel' => '4'],
            
            /* 26 */ ['numGrupo' => '14', 'nombreGrupo' => 'Comunicaciones', 'colorGrupo' => 'N.A', 'grupo_padre' => '12', 'grupo_nivel' => '3'],
            /* 27 */ ['numGrupo' => '14.1', 'nombreGrupo' => 'Comunicaciones', 'colorGrupo' => 'N.A', 'grupo_padre' => '26', 'grupo_nivel' => '4'],
            
            /* 28 */ ['numGrupo' => '15', 'nombreGrupo' => 'Finanzas Públicas', 'colorGrupo' => 'N.A', 'grupo_padre' => '12', 'grupo_nivel' => '3'],
            /* 29 */ ['numGrupo' => '15.1', 'nombreGrupo' => 'Finanzas', 'colorGrupo' => 'N.A', 'grupo_padre' => '28', 'grupo_nivel' => '4'],
        ]);

        $grupo3 = Grupo::insert([
            //Grupo 3 con sectores y temas
            /* 30 */ ['numGrupo' => '3', 'nombreGrupo' => 'Geografía y Medio Ambiente', 'colorGrupo' => 'green', 'grupo_padre' => '1', 'grupo_nivel' => '2'],
            
            /* 31 */ ['numGrupo' => '1', 'nombreGrupo' => 'Aspectos Geográficos y Medio Ambiente', 'colorGrupo' => 'N.A', 'grupo_padre' => '30', 'grupo_nivel' => '3'],
            /* 32 */ ['numGrupo' => '1.1', 'nombreGrupo' => 'Medio Ambiente', 'colorGrupo' => 'N.A', 'grupo_padre' => '31', 'grupo_nivel' => '4'],
            /* 33 */ ['numGrupo' => '1.2', 'nombreGrupo' => 'Agua', 'colorGrupo' => 'N.A', 'grupo_padre' => '31', 'grupo_nivel' => '4'],
            /* 34 */ ['numGrupo' => '1.3', 'nombreGrupo' => 'Actividad Forestal', 'colorGrupo' => 'N.A', 'grupo_padre' => '31', 'grupo_nivel' => '4'],
        ]);

        $grupo4 = Grupo::insert([
            //Grupo 4 con sectores y temas
            /* 35 */ ['numGrupo' => '4', 'nombreGrupo' => 'Gobierno, Seguridad y Justicia', 'colorGrupo' => 'fuchsia', 'grupo_padre' => '1', 'grupo_nivel' => '2'],

            /* 36 */ ['numGrupo' => '6', 'nombreGrupo' => 'Gobierno', 'colorGrupo' => 'N.A', 'grupo_padre' => '35', 'grupo_nivel' => '3'],
            /* 37 */ ['numGrupo' => '6.1', 'nombreGrupo' => 'Gobierno', 'colorGrupo' => 'N.A', 'grupo_padre' => '36', 'grupo_nivel' => '4'],
            /* 38 */ ['numGrupo' => '6.2', 'nombreGrupo' => 'Protección Civil', 'colorGrupo' => 'N.A', 'grupo_padre' => '36', 'grupo_nivel' => '4'],
            /* 39 */ ['numGrupo' => '6.3', 'nombreGrupo' => 'Bienestar Social', 'colorGrupo' => 'N.A', 'grupo_padre' => '36', 'grupo_nivel' => '4'],
            /* 40 */ ['numGrupo' => '6.4', 'nombreGrupo' => 'Asistencia Social', 'colorGrupo' => 'N.A', 'grupo_padre' => '36', 'grupo_nivel' => '4'],

            /* 41 */ ['numGrupo' => '7', 'nombreGrupo' => 'Seguridad y Justicia', 'colorGrupo' => 'N.A', 'grupo_padre' => '35', 'grupo_nivel' => '3'],
            /* 42 */ ['numGrupo' => '7.1', 'nombreGrupo' => 'Seguridad y Justicia', 'colorGrupo' => 'N.A', 'grupo_padre' => '41', 'grupo_nivel' => '4'],
            /* 43 */ ['numGrupo' => '7.2', 'nombreGrupo' => 'Perspectiva de Género', 'colorGrupo' => 'N.A', 'grupo_padre' => '41', 'grupo_nivel' => '4'],
        ]);
    }
}
