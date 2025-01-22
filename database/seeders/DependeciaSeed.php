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
            'tipo_dependencia' => 'Estatal',
            'nombreDependencia' => 'Consejeria  Juridica',
            'direccion' => 'Sebastián Lerdo de Tejada No. 300, Colonia Centro, Toluca, Estado de México. CP 50000.'
        ]);

        $depEstatal2 = Dependencia::create([
            'tipo_dependencia' => 'Estatal',
            'nombreDependencia' => 'Secretaria de Finanzas',
            'direccion' => 'Lerdo Pte. No. 300, Colonia Centro, Toluca, Estado de México. CP 50000.'
        ]);

        $depFederal = Dependencia::create([
            'tipo_dependencia' => 'Federal',
            'nombreDependencia' => 'CFE',
            'direccion' => 'Av. Independencia 1635, Reforma y FFCC Nacionales, 50070 Toluca de Lerdo, Méx'
        ]);

        $unidadEstatal1 = UnidadInformativa::create([
            'dependencia_id' => $depEstatal1->id,
            'nombreUnidad' => 'Dirección General del Registro Civil.',
        ]);

        $unidadEstatal2 = UnidadInformativa::create([
            'dependencia_id' => $depEstatal2->id,
            'nombreUnidad' => 'Dirección General de Recaudación',
        ]);
        
    }
}
