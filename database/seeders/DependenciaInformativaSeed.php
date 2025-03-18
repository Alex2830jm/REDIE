<?php

namespace Database\Seeders;

use App\Events\DirectorioRegisterEvent;
use App\Models\DependenciaInformante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DependenciaInformativaSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dependenciasFederales = [
            /* 1 */ ["numDI" => '1',    "nombreDI" => 'Secretaría de Medio Ambiente y Recursos Naturales (SEMARNAT)', "padreDI" => '0', "nivelDI" => '1'],
            /* 2 */ ["numDI" => '1.1',  "nombreDI" => 'Gerencia Estatal de la Comisión Nacional Forestal de la Semarnat', "padreDI" => '1', "nivelDI" => '2'],

            /* 3 */ ["numDI" => '2',    "nombreDI" => 'Fideicomiso Instituido En Relación con la Agricultura (FIRA)', "padreDI" => '0', "nivelDI" => '1'],
            /* 4 */ ["numDI" => '2.1',  "nombreDI" => 'Subdirección de Planeación y Finanzas Corporativas  del Fideicomiso Instituido en Relación con la Agricultura (FIRA)', "padreDI" => '3', "nivelDI" => '2'],

            /* 5 */ ["numDI" => '3',    "nombreDI" => 'Petroleos Mexicanos (PEMEX)', "padreDI" => '0', "nivelDI" => '1'],
            /* 6 */ ["numDI" => '3.1',  "nombreDI" => 'Gerencia de Integración de Información Institucional de Petróleos Mexicanos', "padreDI" => '5', "nivelDI" => '2'],
 
            /* 7 */ ["numDI" => '4',    "nombreDI" => 'Comisión Federal de Electricidad', "padreDI" => '0', "nivelDI" => '1'],
            /* 8 */ ["numDI" => '4.1',  "nombreDI" => 'Gerencia de la División Centro Sur de la Comisión Federal de Electricidad', "padreDI" => '7', "nivelDI" => '2'],
            /* 9 */ ["numDI" => '4.2',  "nombreDI" => 'Dirección Corporativa de Operación de la Comisión Federal de Electricidad', "padreDI" => '7', "nivelDI" => '2'],

            /* 10 */ ["numDI" => '5',   "nombreDI" => 'Seguridad Alimentaria Mexicana (SEGALMEX)', "padreDI" => '0', "nivelDI" => '1'],
            /* 11 */ ["numDI" => '5.1', "nombreDI" => 'Dirección General de Seguridad Alimentaria Mexicana (LICONSA)', "padreDI" => '10', "nivelDI" => '2'],


            /* 12 */ ["numDI" => '6',   "nombreDI" => 'Secretaría de Comunicaciones y Transportes (S.C.T.)', "padreDI" => '0', "nivelDI" => '1'],
            /* 13 */ ["numDI" => '6.1', "nombreDI" => 'Dirección de Estadística y Cartografía de la Secretaría de Comunicaciones y Transportes', "padreDI" => '12', "nivelDI" => '2'],
            /* 14 */ ["numDI" => '6.2', "nombreDI" => 'Dirección General del Centro SCT del Estado de México', "padreDI" => '12', "nivelDI" => '2'],
            /* 15 */ ["numDI" => '6.3', "nombreDI" => 'Gerencia Regional de la Zona Centro de Telecomunicaciones de México', "padreDI" => '12', "nivelDI" => '2'],
            /* 16 */ ["numDI" => '6.4', "nombreDI" => 'Dirección General del Servicio Postal Mexicano', "padreDI" => '12', "nivelDI" => '2'],
            
            /* 17 */ ["numDI" => '7',   "nombreDI" => 'Instituto Federal de Telecomunicaciones', "padreDI" => '0', "nivelDI" => '1'],
            /* 18 */ ["numDI" => '7.1', "nombreDI" => 'Coordinación General de Planeación Estratégica del Instituto Federal de Telecomunicaciones', "padreDI" => '17', "nivelDI" => '2'],
            /* 19 */ ["numDI" => '7.2', "nombreDI" => 'Unidad de Concesiones y Servicios del Instituto Federal de Telecomunicaciones', "padreDI" => '17', "nivelDI" => '2'],

            /* 20 */ ["numDI" => '8',   "nombreDI" => 'Secretaría de Agricultura y Desarrollo Rural', "padreDI" => '0', "nivelDI" => '1'],
            /* 21 */ ["numDI" => '9',   "nombreDI" => 'Telecomunicaciones de México (TELECOMM)', "padreDI" => '0', "nivelDI" => '1'],

        ];

        $dependenciasEstatales = [
           /* 22 */ ["numDI" => '1',    "nombreDI" => 'Secretaría General de Gobierno', "padreDI" => '0', "nivelDI" => '1'],
           /* 23 */ ["numDI" => '1',    "nombreDI" => 'Coordinación de Control de Gestión y Unidad de Información, Planeación, Programación y Evaluación', "padreDI" => '22', "nivelDI" => '2'],
           /* 24 */ ["numDI" => '1.1',  "nombreDI" => 'Consejo Estatal de Población del Estado de México (COESPO)', "padreDI" => '22', "nivelDI" => '2'],
           /* 25 */ ["numDI" => '1.2',  "nombreDI" => 'Coordinación  General de  Protección Civil', "padreDI" => '22', "nivelDI" => '2'],

           /* 26 */ ["numDI" => '2',    "nombreDI" => 'Secretaría de Seguridad', "padreDI" => '0', "nivelDI" => '1'],
           /* 27 */ ["numDI" => '2',    "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación ', "padreDI" => '26', "nivelDI" => '2'],
           /* 27 */ ["numDI" => '2.1',  "nombreDI" => 'Dirección General de Seguridad Pública y Transito', "padreDI" => '26', "nivelDI" => '2'],
           /* 29 */ ["numDI" => '2.2',  "nombreDI" => 'Dirección General de Prevención y Readaptación Social', "padreDI" => '26', "nivelDI" => '2'],
           /* 30 */ ["numDI" => '2.3',  "nombreDI" => 'Instituto Mexiquense de Seguridad y Justicia', "padreDI" => '26', "nivelDI" => '2'],

           /* 31 */ ["numDI" => '3',    "nombreDI" => 'Secretaría de Finanzas', "padreDI" => '0', "nivelDI" => '1'],
           /* 32 */ ["numDI" => '3',    "nombreDI" => 'Dirección General de Información, Planeación, Programación y Evaluación', "padreDI" => '31', "nivelDI" => '2'],
           /* 33 */ ["numDI" => '3.1',  "nombreDI" => 'Dirección General de Inversión', "padreDI" => '31', "nivelDI" => '2'],
           /* 34 */ ["numDI" => '3.2',  "nombreDI" => 'Dirección General de Recaudación', "padreDI" => '31', "nivelDI" => '2'],
           /* 35 */ ["numDI" => '3.3',  "nombreDI" => 'Contaduría General Gubernamental', "padreDI" => '31', "nivelDI" => '2'],

           /* 36 */ ["numDI" => '4',    "nombreDI" => 'Secretaría de Salud', "padreDI" => '0', "nivelDI" => '1'],
           /* 37 */ ["numDI" => '1',    "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación de la Secretaría de Salud', "padreDI" => '36', "nivelDI" => '2'],
           /* 38 */ ["numDI" => '4.1',  "nombreDI" => 'Instituto de Salud del Estado de México (ISEM)', "padreDI" => '36', "nivelDI" => '2'],
           /* 39 */ ["numDI" => '4.2',  "nombreDI" => 'Sistema Para el Desarrollo Integral de la Familia (DIFEM)', "padreDI" => '36', "nivelDI" => '2'],
           /* 40 */ ["numDI" => '4.3',  "nombreDI" => 'Instituto Materno Infantil del Estado de México (IMIEM)', "padreDI" => '36', "nivelDI" => '2'],
           /* 41 */ ["numDI" => '4.4',  "nombreDI" => 'Instituto Mexicano del Seguro Social (IMSS-OTE)', "padreDI" => '36', "nivelDI" => '2'],
           /* 42 */ ["numDI" => '4.5',  "nombreDI" => 'Instituto Mexicano del Seguro Social (IMSS-PTE)', "padreDI" => '36', "nivelDI" => '2'],
           /* 43 */ ["numDI" => '4.6',  "nombreDI" => 'Delegación del Instituto de Seguridad y Servicios Sociales de los Trabajadores del Estado (ISSSTE)', "padreDI" => '36', "nivelDI" => '2'],
           /* 44 */ ["numDI" => '4.7',  "nombreDI" => 'Instituto de Seguridad Social del Estado de México y Municipios (ISSEMyM)', "padreDI" => '36', "nivelDI" => '2'],

           /* 45 */ ["numDI" => '5',    "nombreDI" => 'Secretaría del Trabajo', "padreDI" => '0', "nivelDI" => '1'],
           /* 46 */ ["numDI" => '5',    "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación', "padreDI" => '45', "nivelDI" => '2'],
           /* 47 */ ["numDI" => '5.1',  "nombreDI" => 'Dirección General de Empleo y Productividad', "padreDI" => '45', "nivelDI" => '2'],
           /* 48 */ ["numDI" => '5.2',  "nombreDI" => 'Instituto de Capacitación y Adiestramiento para el Trabajo Industrial (ICATI)', "padreDI" => '45', "nivelDI" => '2'],
           /* 49 */ ["numDI" => '5.3',  "nombreDI" => 'Junta local de Conciliación y Arbitraje del Valle Cuautitlán-Texcoco', "padreDI" => '45', "nivelDI" => '2'],
           /* 50 */ ["numDI" => '5.4',  "nombreDI" => 'Junta local de Conciliación y Arbitraje del Valle Toluca', "padreDI" => '45', "nivelDI" => '2'],

           /* 51 */ ["numDI" => '6',    "nombreDI" => 'Secretaría de Educación, Ciencia, Tecnología e Innovación', "padreDI" => '0', "nivelDI" => '1'],
           /* 52 */ ["numDI" => '6',    "nombreDI" => 'Dirección General de Información, Planeación, Programación y Evaluación', "padreDI" => '51', "nivelDI" => '2'],
           /* 53 */ ["numDI" => '6.1',  "nombreDI" => 'Dirección de Información y Planeación    ', "padreDI" => '51', "nivelDI" => '2'],
           /* 54 */ ["numDI" => '6.2',  "nombreDI" => 'Dirección General de Cultura Física y Deporte', "padreDI" => '51', "nivelDI" => '2'],

           /* 55 */ ["numDI" => '7',    "nombreDI" => 'Secretaría de Bienestar', "padreDI" => '0', "nivelDI" => '1'],
           /* 56 */ ["numDI" => '7',    "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación', "padreDI" => '55', "nivelDI" => '2'],
           /* 57 */ ["numDI" => '7.1',  "nombreDI" => 'Junta de Asistencia Privada del Estado de México', "padreDI" => '55', "nivelDI" => '2'],
           /* 58 */ ["numDI" => '7.2',  "nombreDI" => 'Consejo Estatal para el Desarrollo Integral de los Pueblos Indígenas del Estado de México (CEDIPIEM)', "padreDI" => '55', "nivelDI" => '2'],
           
           /* 59 */ ["numDI" => '8',    "nombreDI" => 'Secretaría de Desarrollo Urbano e Infraestructura', "padreDI" => '0', "nivelDI" => '1'],
           /* 60 */ ["numDI" => '8',    "nombreDI" => 'Unidad De Información, Planeación, Programación y Evaluación ', "padreDI" => '59', "nivelDI" => '2'],
           /* 61 */ ["numDI" => '8.1',  "nombreDI" => 'Dirección de Operación Urbana', "padreDI" => '59', "nivelDI" => '2'],
           /* 62 */ ["numDI" => '8.2',  "nombreDI" => 'Dirección de Promoción y Fomento a la Vivienda', "padreDI" => '59', "nivelDI" => '2'],

           /* 63 */ ["numDI" => '9',    "nombreDI" => 'Secretaría del Campo', "padreDI" => '0', "nivelDI" => '1'],
           /* 64 */ ["numDI" => '9',    "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación ', "padreDI" => '63', "nivelDI" => '2'],
           /* 65 */ ["numDI" => '9.1',  "nombreDI" => 'PROBOSQUE', "padreDI" => '63', "nivelDI" => '2'],

           /* 66 */ ["numDI" => '10',    "nombreDI" => 'Secretaría de Desarrollo Económico', "padreDI" => '0', "nivelDI" => '1'],
           /* 67 */ ["numDI" => '10',    "nombreDI" => 'Unidad de Planeación e Igualdad de Género ', "padreDI" => '66', "nivelDI" => '2'],
           /* 68 */ ["numDI" => '10.1',  "nombreDI" => 'Dirección General de Comercio', "padreDI" => '66', "nivelDI" => '2'],
           /* 69 */ ["numDI" => '10.2',  "nombreDI" => 'Dirección General del Instituto de Fomento Minero y Estudios Geológicos del Estado De México', "padreDI" => '66', "nivelDI" => '2'],

           /* 70 */ ["numDI" => '11',    "nombreDI" => 'Secretaría de Cultura y Turismo', "padreDI" => '0', "nivelDI" => '1'],
           /* 71 */ ["numDI" => '11',    "nombreDI" => 'Unidad de Planeación, Programación y Evaluación', "padreDI" => '70', "nivelDI" => '2'],
           /* 72 */ ["numDI" => '11.1',  "nombreDI" => 'Dirección General del Instituto Mexiquense de Cultura (IMC)', "padreDI" => '70', "nivelDI" => '2'],
           /* 73 */ ["numDI" => '11.2',  "nombreDI" => 'Dirección General de Turismo', "padreDI" => '70', "nivelDI" => '2'],
           /* 74 */ ["numDI" => '11.3',  "nombreDI" => 'Instituto de Investigación y Fomento de las Artesanias del Estado de México', "padreDI" => '70', "nivelDI" => '2'],

           /* 75 */ ["numDI" => '12',    "nombreDI" => 'Secretaría de la Contraloría', "padreDI" => '0', "nivelDI" => '1'],
           /* 76 */ ["numDI" => '12',    "nombreDI" => 'Unidad de Planeación y Evaluación Institucional', "padreDI" => '75', "nivelDI" => '2'],
           /* 77 */ ["numDI" => '12.1',  "nombreDI" => 'Dirección General de Responsabilidades', "padreDI" => '75', "nivelDI" => '2'],
           /* 78 */ ["numDI" => '12.2',  "nombreDI" => 'Dirección de Control y Evaluación', "padreDI" => '75', "nivelDI" => '2'],

           /* 79 */ ["numDI" => '13',    "nombreDI" => 'Secretaría de Medio Ambiente y Desarrollo Sostenible', "padreDI" => '0', "nivelDI" => '1'],
           /* 80 */ ["numDI" => '13',    "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación', "padreDI" => '79', "nivelDI" => '2'],
           /* 81 */ ["numDI" => '13.1',  "nombreDI" => 'Comisión Estatal de Parques Naturales y de la Fauna (CEPANAF)', "padreDI" => '79', "nivelDI" => '2'],
           /* 82 */ ["numDI" => '13.2',  "nombreDI" => 'Coordinación General de Conservación Ecológica', "padreDI" => '79', "nivelDI" => '2'],
           /* 83 */ ["numDI" => '13.3',  "nombreDI" => 'Dirección General de Prevención y Control de la Contaminación Atmosférica', "padreDI" => '79', "nivelDI" => '2'],
           /* 84 */ ["numDI" => '13.4',  "nombreDI" => 'Dirección General de Ordenamiento e Impacto Ambiental', "padreDI" => '79', "nivelDI" => '2'],
           /* 85 */ ["numDI" => '13.5',  "nombreDI" => 'Dirección General de Manejo Integral de Residuos', "padreDI" => '79', "nivelDI" => '2'],
           /* 86 */ ["numDI" => '13.6',  "nombreDI" => 'Dirección General de Concertación y Participación Ciudadana', "padreDI" => '79', "nivelDI" => '2'],
           /* 87 */ ["numDI" => '13.7',  "nombreDI" => 'Procuraduría de Protección al Ambiente', "padreDI" => '79', "nivelDI" => '2'],
           /* 88 */ ["numDI" => '13.8',  "nombreDI" => 'Instituto Estatal de Energía y Cambio Climático', "padreDI" => '79', "nivelDI" => '2'],

           /* 89 */ ["numDI" => '14',    "nombreDI" => 'Secretaría del Agua', "padreDI" => '0', "nivelDI" => '1'],
           /* 90 */ ["numDI" => '14',    "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación ', "padreDI" => '89', "nivelDI" => '2'],
           /* 91 */ ["numDI" => '14.1',  "nombreDI" => 'Comisión del Agua del Estado de México (CAEM)', "padreDI" => '89', "nivelDI" => '2'],

           /* 92 */ ["numDI" => '15',    "nombreDI" => 'Secretaría de las Mujeres', "padreDI" => '0', "nivelDI" => '1'],
           /* 93 */ ["numDI" => '15',    "nombreDI" => 'Unidad de Planeación, Programación y Evaluación', "padreDI" => '92', "nivelDI" => '2'],
           /* 94 */ ["numDI" => '15.1',  "nombreDI" => 'Dirección General de Igualdad Sustantiva', "padreDI" => '92', "nivelDI" => '2'],
           /* 95 */ ["numDI" => '15.2',  "nombreDI" => 'Dirección General de Perspectiva de Género', "padreDI" => '92', "nivelDI" => '2'],
           /* 96 */ ["numDI" => '15.3',  "nombreDI" => 'Dirección General de Prevención y Atención a la Violencia', "padreDI" => '92', "nivelDI" => '2'],

           /* 97 */  ["numDI" => '16',    "nombreDI" => 'Secretaría de Movilidad', "padreDI" => '0', "nivelDI" => '1'],
           /* 98 */  ["numDI" => '16',    "nombreDI" => 'Dirección General de Información, Planeación, Programación y Evaluación', "padreDI" => '97', "nivelDI" => '2'],
           /* 99 */  ["numDI" => '16.1',  "nombreDI" => 'Dirección del Registro Público de Transporte', "padreDI" => '97', "nivelDI" => '2'],
           /* 100 */ ["numDI" => '16.2',  "nombreDI" => 'Dirección General de Vialidad', "padreDI" => '97', "nivelDI" => '2'],
           /* 101 */ ["numDI" => '16.3',  "nombreDI" => 'Dirección General de la Junta de Caminos del Estado de México', "padreDI" => '97', "nivelDI" => '2'],
           /* 102 */ ["numDI" => '16.4',  "nombreDI" => 'Dirección General del Sistema de Autopistas, Aeropuertos, Servicios Conexos y Auxiliares del Estado de México', "padreDI" => '97', "nivelDI" => '2'],
           /* 103 */ ["numDI" => '16.5',  "nombreDI" => 'Director General del Sistema de Transporte Masivo y Teleférico del Estado de México', "padreDI" => '97', "nivelDI" => '2'],

           /* 104 */ ["numDI" => '17',    "nombreDI" => 'Consejería Jurídica', "padreDI" => '0', "nivelDI" => '1'],
           /* 105 */ ["numDI" => '17',    "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación ', "padreDI" => '104', "nivelDI" => '2'],
           /* 106 */ ["numDI" => '17.1',  "nombreDI" => 'Dirección General del Registro Civil del Estado de México', "padreDI" => '104', "nivelDI" => '2'],
           /* 107 */ ["numDI" => '17.2',  "nombreDI" => 'Instituto de la Función Registral', "padreDI" => '104', "nivelDI" => '2'],
           /* 108 */ ["numDI" => '17.3',  "nombreDI" => 'Instituto de la Defensoría Pública', "padreDI" => '104', "nivelDI" => '2'],

           /* 109 */ ["numDI" => '18',  "nombreDI" => 'Oficialía Mayor', "padreDI" => '0', "nivelDI" => '1'],
           /* 110 */ ["numDI" => '18',  "nombreDI" => 'Dirección General de Personal', "padreDI" => '109', "nivelDI" => '2'],

           /* 111 */ ["numDI" => '19',    "nombreDI" => 'Físcalia General de Justicia del Estado de México', "padreDI" => '0', "nivelDI" => '1'],
           /* 112 */ ["numDI" => '19',    "nombreDI" => 'Dirección General de Información, Planeación, Programación y Evaluación', "padreDI" => '111', "nivelDI" => '2'],
           /* 113 */ ["numDI" => '19.1',  "nombreDI" => 'Departamento de Evaluación y Estadística', "padreDI" => '111', "nivelDI" => '2'],
           /* 114 */ ["numDI" => '19.2',  "nombreDI" => 'Dirección General de Administración', "padreDI" => '111', "nivelDI" => '2'],
           /* 115 */ ["numDI" => '19.3',  "nombreDI" => 'Dirección General Juridica y Consultiva', "padreDI" => '111', "nivelDI" => '2'],
           /* 116 */ ["numDI" => '19.4',  "nombreDI" => 'Comisaria de la Policia Ministerial', "padreDI" => '111', "nivelDI" => '2'],
           /* 117 */ ["numDI" => '19.5',  "nombreDI" => 'Fiscalia Especializada en Combate a la Corrupción', "padreDI" => '111', "nivelDI" => '2'],
           /* 118 */ ["numDI" => '19.6',  "nombreDI" => 'Coordinación General de Servicios Periciales', "padreDI" => '111', "nivelDI" => '2'],

           /* 119 */ ["numDI" => '20',    "nombreDI" => 'Sistema para el Desarrollo Integral de la Familia en el Estado de México  (SDIFEM)', "padreDI" => '0', "nivelDI" => '1'],
           /* 120 */ ["numDI" => '20',    "nombreDI" => 'Unidad de Planeación, Programación y Evaluación', "padreDI" => '119', "nivelDI" => '2'],
           /* 121 */ ["numDI" => '20.1',  "nombreDI" => 'Dirección de Alimentación y Nutrición Familiar', "padreDI" => '119', "nivelDI" => '2'],
           /* 122 */ ["numDI" => '20.2',  "nombreDI" => 'Dirección de Atención a la Discapacidad', "padreDI" => '119', "nivelDI" => '2'],
           /* 123 */ ["numDI" => '20.3',  "nombreDI" => 'Dirección de Servicios Jurídico - Asistenciales', "padreDI" => '119', "nivelDI" => '2'],
           /* 124 */ ["numDI" => '20.4',  "nombreDI" => 'Dirección de Prevención y Bienestar Familiar', "padreDI" => '119', "nivelDI" => '2'],
           /* 125 */ ["numDI" => '20.5',  "nombreDI" => 'Coordinación de Atención a Adultos Mayores y Grupos Indigenas', "padreDI" => '119', "nivelDI" => '2'],

           /* 126 */ ["numDI" => '21',  "nombreDI" => 'Órgano Superior de Fiscalización del Estado de México', "padreDI" => '0', "nivelDI" => '1'],
           /* 127 */ ["numDI" => '21',  "nombreDI" => 'Órgano Superior de Fiscalización del Estado de México (OSFEM)', "padreDI" => '126', "nivelDI" => '2'],

           /* 128 */ ["numDI" => '22',  "nombreDI" => 'Instituto de Seguridad Social del Estado de México y Municipios (ISSEMyM)', "padreDI" => '0', "nivelDI" => '1'],
           /* 129 */ ["numDI" => '22',  "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación', "padreDI" => '128', "nivelDI" => '2'],
           
           /* 130 */ ["numDI" => '23',  "nombreDI" => 'Poder Judicial del Estado de México', "padreDI" => '0', "nivelDI" => '1'],
           /* 131 */ ["numDI" => '23',  "nombreDI" => 'Dirección General de Finanzas y Planeación', "padreDI" => '130', "nivelDI" => '2'],

           /* 132 */ ["numDI" => '24',  "nombreDI" => 'Poder  Legislativo del Estado de México', "padreDI" => '0', "nivelDI" => '1'],
           /* 133 */ ["numDI" => '24',  "nombreDI" => 'Poder Legislativo del Estado de México', "padreDI" => '132', "nivelDI" => '2'],
           /* 134 */ ["numDI" => '24.1',  "nombreDI" => 'Dirección de Administración y Desarrollo de Personal', "padreDI" => '132', "nivelDI" => '2'],
        ];

        foreach( $dependenciasFederales as $i => $DF) {
            $dependenciaFederal = DependenciaInformante::create([
                'tipoDI' => 'Federal',
                'numDI' => $DF['numDI'], 
                'nombreDI' => $DF['nombreDI'], 
                'padreDI' => $DF['padreDI'], 
                'nivelDI' => $DF['nivelDI']
            ]);

            event(new DirectorioRegisterEvent($dependenciaFederal));
        }

        foreach ( $dependenciasEstatales as $DE ) {
            $dependenciaEstatal = DependenciaInformante::create([
                'tipoDI' => 'Estatal',
                'numDI' => $DE['numDI'], 
                'nombreDI' => $DE['nombreDI'], 
                'padreDI' => $DE['padreDI'], 
                'nivelDI' => $DE['nivelDI']
            ]);

            event(new DirectorioRegisterEvent($dependenciaEstatal));
        }
    }
}
