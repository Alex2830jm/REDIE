<?php

namespace Database\Seeders;

use App\Models\Temas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class TemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* $temas = [
            'Hechos Vitales',
            'Vivienda y Urbanización',
            'Educación',
            'Cultura y Deporte',
            'Salud',
            'Trabajo',

            'Agricultura',
            'Ganaderia',
            'Pesca',
            'Energía Eléctrica',
            'Minería',
            'Comercio',
            'Turismo',
            'Transporte',
            'Comunicaciones',
            'Finanzas',

            'Medio Ambiente',
            'Agua',
            'Actividad Forestal',
            
            'Gobierno',
            'Protección Civil',
            'Bienestar Social',
            'Seguridad y Justicia',
            'Perspectiva de Género'
        ];

        foreach($temas as $tema) {
            Temas::create([
                'nombreTema' => $tema,
            ]);
        } */

        $temas = Temas::insert([
            //Grupo 1
            ['nombreTema' => 'Hechos Vitales', 'sector_id' => '1'],
            ['nombreTema' => 'Vivienda y Urbanización', 'sector_id' => '2'],

            //Grupo 2
            ['nombreTema' => 'Agricultura', 'sector_id' => '3'],
            ['nombreTema' => 'Pesca', 'sector_id' => '3'],
            ['nombreTema' => 'Energía Eléctrica', 'sector_id' => '4'],
            ['nombreTema' => 'Comercio', 'sector_id' => '5'],

            //Grupo 3
            ['nombreTema' => 'Medio Ambiente', 'sector_id' => '6'],
            ['nombreTema' => 'Actividad Forestal', 'sector_id' => '6'],

            //Grupo 1 y Sector
            ['nombreTema' => 'Gobierno', 'sector_id' => '7'],
            ['nombreTema' => 'Perspectiva de género', 'sector_id' => '8'],
        ]);
    }
}
