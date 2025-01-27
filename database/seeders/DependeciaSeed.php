<?php

namespace Database\Seeders;

use App\Models\Dependencia;
use App\Models\UnidadInformativa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DependeciaSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //Estatal
        $depEstatal1 = Dependencia::create([
            ['tipo_dependencia' => 'Estatal',
            'nombreDependencia' => 'Secretaría de Educación',
            'direccion' => 'Sebastián Lerdo de Tejada No. 300, Colonia Centro, Toluca, Estado de México. CP 50000.'],
        ]);

        $depEstatal2 = Dependencia::create([
            'tipo_dependencia' => 'Estatal',
            'nombreDependencia' => 'Secretaría de Movilidad',
            'direccion' => 'Lerdo Pte. No. 300, Colonia Centro, Toluca, Estado de México. CP 50000.'
        ]);

        $depEstatal3 = Dependencia::create([
            'tipo_dependencia' => 'Estatal',
            'nombreDependencia' => 'Secretaría de Salud',
            'direccion' => 'Lerdo Pte. No. 300, Colonia Centro, Toluca, Estado de México. CP 50000.'
        ]);

        $depEstatal4 = Dependencia::create([
            'tipo_dependencia' => 'Estatal',
            'nombreDependencia' => 'Secretaria de Finanzas',
            'direccion' => 'Lerdo Pte. No. 300, Colonia Centro, Toluca, Estado de México. CP 50000.'
        ]);

        $depEstatal4 = Dependencia::create([
            'tipo_dependencia' => 'Estatal',
            'nombreDependencia' => 'Secretaría del Trabajo',
            'direccion' => 'Lerdo Pte. No. 300, Colonia Centro, Toluca, Estado de México. CP 50000.'
        ]);


        $depFederal1 = Dependencia::create([
            'tipo_dependencia' => 'Federal',
            'nombreDependencia' => 'Fideicomiso Instituido en Relación con la Agricultura',
            'direccion' => 'Av. Independencia 1635, Reforma y FFCC Nacionales, 50070 Toluca de Lerdo, Méx'
        ]);

        $depFederal1 = Dependencia::create([
            'tipo_dependencia' => 'Federal',
            'nombreDependencia' => 'Comisión Federal de Electricidad',
            'direccion' => 'Av. Independencia 1635, Reforma y FFCC Nacionales, 50070 Toluca de Lerdo, Méx'
        ]);
        $depFederal1 = Dependencia::create([
            'tipo_dependencia' => 'Federal',
            'nombreDependencia' => 'Banco de México',
            'direccion' => 'Av. Independencia 1635, Reforma y FFCC Nacionales, 50070 Toluca de Lerdo, Méx'
        ]);
        $depFederal1 = Dependencia::create([
            'tipo_dependencia' => 'Federal',
            'nombreDependencia' => 'Instituto Federal de Telecomunicaciones',
            'direccion' => 'Av. Independencia 1635, Reforma y FFCC Nacionales, 50070 Toluca de Lerdo, Méx'
        ]);
        
    }
}
