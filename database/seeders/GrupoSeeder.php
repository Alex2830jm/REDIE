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
            /* 2 */ ['nombreGrupo' => 'Demografía y Sociedad', 'colorGrupo' => 'orange', 'grupo_padre' => '1', 'grupo_nivel' => '2'],
            /* 3 */ ['nombreGrupo' => 'Población', 'colorGrupo' => 'N.A', 'grupo_padre' => '2', 'grupo_nivel' => '3'],
            /* 4 */ ['nombreGrupo' => 'Hechos Vitales', 'colorGrupo' => 'N.A', 'grupo_padre' => '3', 'grupo_nivel' => '4'],
            /* 5 */ ['nombreGrupo' => 'Vivienda y Urbanización', 'colorGrupo' => 'N.A', 'grupo_padre' => '2', 'grupo_nivel' => '3'],
            /* 6 */ ['nombreGrupo' => 'Vivienda y Urbanización', 'colorGrupo' => 'N.A', 'grupo_padre' => '5', 'grupo_nivel' => '4'],
            /* 7 */ ['nombreGrupo' => 'Educación, Ciencia y Tecnología', 'colorGrupo' => 'N.A', 'grupo_padre' => '2', 'grupo_nivel' => '3'],
            /* 8 */ ['nombreGrupo' => 'Educación', 'colorGrupo' => 'N.A', 'grupo_padre' => '7', 'grupo_nivel' => '4'],
            /* 9 */ ['nombreGrupo' => 'Cultura y Deporte', 'colorGrupo' => 'N.A', 'grupo_padre' => '7', 'grupo_nivel' => '4'],
            /* 10 */ ['nombreGrupo' => 'Salud y Seguridad Social', 'colorGrupo' => 'N.A', 'grupo_padre' => '2', 'grupo_nivel' => '3'],
            /* 11 */ ['nombreGrupo' => 'Salud', 'colorGrupo' => 'N.A', 'grupo_padre' => '10', 'grupo_nivel' => '4'],
            /* 12 */ ['nombreGrupo' => 'Trabajo', 'colorGrupo' => 'N.A', 'grupo_padre' => '2', 'grupo_nivel' => '3'],
            /* 13 */ ['nombreGrupo' => 'Trabajo', 'colorGrupo' => 'N.A', 'grupo_padre' => '12', 'grupo_nivel' => '4'],
        ]);

        $grupo2 = Grupo::insert([
            //Grupo 2 con sectores y temas
            /* 14 */ ['nombreGrupo' => 'Economía y Sectores Productivos', 'colorGrupo' => 'sky', 'grupo_padre' => '1', 'grupo_nivel' => '2'],
            /* 15 */ ['nombreGrupo' => 'Agropecuario y Pesca', 'colorGrupo' => 'N.A', 'grupo_padre' => '14', 'grupo_nivel' => '3'],
            /* 16 */ ['nombreGrupo' => 'Agricultura', 'colorGrupo' => 'N.A', 'grupo_padre' => '15', 'grupo_nivel' => '4'],
            /* 17 */ ['nombreGrupo' => 'Ganadería', 'colorGrupo' => 'N.A', 'grupo_padre' => '15', 'grupo_nivel' => '4'],
            /* 18 */ ['nombreGrupo' => 'Pesca', 'colorGrupo' => 'N.A', 'grupo_padre' => '15', 'grupo_nivel' => '4'],
            /* 19 */ ['nombreGrupo' => 'Industria', 'colorGrupo' => 'N.A', 'grupo_padre' => '14', 'grupo_nivel' => '3'],
            /* 20 */ ['nombreGrupo' => 'Energía Eléctrica', 'colorGrupo' => 'N.A', 'grupo_padre' => '19', 'grupo_nivel' => '4'],
            /* 21 */ ['nombreGrupo' => 'Minería', 'colorGrupo' => 'N.A', 'grupo_padre' => '19', 'grupo_nivel' => '4'],
            /* 22 */ ['nombreGrupo' => 'Comercio', 'colorGrupo' => 'N.A', 'grupo_padre' => '14', 'grupo_nivel' => '3'],
            /* 23 */ ['nombreGrupo' => 'Comercio', 'colorGrupo' => 'N.A', 'grupo_padre' => '22', 'grupo_nivel' => '4'],
            /* 24 */ ['nombreGrupo' => 'Turismo', 'colorGrupo' => 'N.A', 'grupo_padre' => '14', 'grupo_nivel' => '3'],
            /* 25 */ ['nombreGrupo' => 'Turismo', 'colorGrupo' => 'N.A', 'grupo_padre' => '24', 'grupo_nivel' => '4'],
            /* 26 */ ['nombreGrupo' => 'Transporte', 'colorGrupo' => 'N.A', 'grupo_padre' => '14', 'grupo_nivel' => '3'],
            /* 27 */ ['nombreGrupo' => 'Transporte', 'colorGrupo' => 'N.A', 'grupo_padre' => '26', 'grupo_nivel' => '4'],
            /* 28 */ ['nombreGrupo' => 'Comunicaciones', 'colorGrupo' => 'N.A', 'grupo_padre' => '14', 'grupo_nivel' => '3'],
            /* 29 */ ['nombreGrupo' => 'Comunicaciones', 'colorGrupo' => 'N.A', 'grupo_padre' => '28', 'grupo_nivel' => '4'],
            /* 30 */ ['nombreGrupo' => 'Finanzas Públicas', 'colorGrupo' => 'N.A', 'grupo_padre' => '14', 'grupo_nivel' => '3'],
            /* 31 */ ['nombreGrupo' => 'Finanzas', 'colorGrupo' => 'N.A', 'grupo_padre' => '30', 'grupo_nivel' => '4'],
        ]);

        $grupo3 = Grupo::insert([
            //Grupo 3 con sectores y temas
            /* 32 */ ['nombreGrupo' => 'Geografía y Medio Ambiente', 'colorGrupo' => 'green', 'grupo_padre' => '1', 'grupo_nivel' => '2'],
            /* 33 */ ['nombreGrupo' => 'Aspectos Geográficos y Medio Ambiente', 'colorGrupo' => 'N.A', 'grupo_padre' => '32', 'grupo_nivel' => '3'],
            /* 34 */ ['nombreGrupo' => 'Medio Ambiente', 'colorGrupo' => 'N.A', 'grupo_padre' => '33', 'grupo_nivel' => '4'],
            /* 35 */ ['nombreGrupo' => 'Agua', 'colorGrupo' => 'N.A', 'grupo_padre' => '33', 'grupo_nivel' => '4'],
            /* 36 */ ['nombreGrupo' => 'Actividad Forestal', 'colorGrupo' => 'N.A', 'grupo_padre' => '33', 'grupo_nivel' => '4'],
        ]);

        $grupo4 = Grupo::insert([
            //Grupo 4 con sectores y temas
            /* 37 */ ['nombreGrupo' => 'Gobierno, Seguridad y Justicia', 'colorGrupo' => 'fuchsia', 'grupo_padre' => '1', 'grupo_nivel' => '2'],

            /* 38 */ ['nombreGrupo' => 'Gobierno', 'colorGrupo' => 'N.A', 'grupo_padre' => '37', 'grupo_nivel' => '3'],
            /* 39 */ ['nombreGrupo' => 'Gobierno', 'colorGrupo' => 'N.A', 'grupo_padre' => '38', 'grupo_nivel' => '4'],
            /* 40 */ ['nombreGrupo' => 'Protección Civil', 'colorGrupo' => 'N.A', 'grupo_padre' => '38', 'grupo_nivel' => '4'],
            /* 41 */ ['nombreGrupo' => 'Bienestar Social', 'colorGrupo' => 'N.A', 'grupo_padre' => '38', 'grupo_nivel' => '4'],

            /* 42 */ ['nombreGrupo' => 'Seguridad y Justicia', 'colorGrupo' => 'N.A', 'grupo_padre' => '37', 'grupo_nivel' => '3'],
            /* 43 */ ['nombreGrupo' => 'Seguridad y Justicia', 'colorGrupo' => 'N.A', 'grupo_padre' => '42', 'grupo_nivel' => '4'],
            /* 44 */ ['nombreGrupo' => 'Perspectiva de Género', 'colorGrupo' => 'N.A', 'grupo_padre' => '42', 'grupo_nivel' => '4'],
        ]);
    }
}
