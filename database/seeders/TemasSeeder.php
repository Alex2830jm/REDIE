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
        $temas = [
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
        }
    }
}
