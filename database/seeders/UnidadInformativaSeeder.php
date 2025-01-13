<?php

namespace Database\Seeders;

use App\Models\AreasUnidad;
use App\Models\PersonaUnidad;
use App\Models\UnidadInformativa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadInformativaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //Unidades Generadoras de Información
        UnidadInformativa::insert([
            /* 1 */ ['nombreUnidad' => 'Secretaría de Justicia y Derechos Humanos', 'direccion' => 'Lerdo Poniente No. 300, Segundo piso, puerta 327, Colonia Centro, Toluca, Estado de México. CP 50000'],
        ]);

        //Áreas de las unidades
        AreasUnidad::insert([
            /* 1 */ ['unidad_id' => '1', 'nombreArea' => 'Dirección General del Registro Civil.'],
            /* 2 */ ['unidad_id' => '1', 'nombreArea' => 'Dirección General de Justicia Cotidiana'],
            /* 3 */ ['unidad_id' => '1', 'nombreArea' => 'Dirección General Jurídica y Consultiva'],
            /* 4 */ ['unidad_id' => '1', 'nombreArea' => 'Dirección General de Asuntos Agrarios'],
            /* 5 */ ['unidad_id' => '1', 'nombreArea' => 'Dirección General de Procedimientos y Asuntos Notariales'],
        ]);

        PersonaUnidad::insert([
            ['area_id' => '1', 'nombrePersona' => 'Jose Carlos Moncada Garcia', 'profesion' => 'Pasante en Ciencias Politicas y Administración Pública', 'cargo' => 'Jefe de Oficina / Titular', 'telefono' => '7228964102 ext. 7841',],
            ['area_id' => '2', 'nombrePersona' => 'Hector Porras Rivera', 'profesion' => 'Licenciado en Derecho', 'cargo' => 'Jefe de Oficina / Titular', 'telefono' => '7289634108 ext. 9674',],
        ]);
    }
}
