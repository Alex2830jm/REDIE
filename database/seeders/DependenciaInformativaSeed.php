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
            /* 1 */["numDI" => '1',    "nombreDI" => 'Secretaría de Medio Ambiente y Recursos Naturales (SEMARNAT)', "padreDI" => '0', "nivelDI" => '1'],
            /* 2 */["numDI" => '1..1', "nombreDI" => 'Generencia Estatal de la Comisión Nacional Forestal de la SEMARNAT', "padreDI" => '1', "nivelDI" => '2'],

            /* 3 */["numDI" => '2',    "nombreDI" => 'Fideicomisio Instituido en Relación con la Agricultura (FIRA)', "padreDI" => '0', "nivelDI" => '1'],
            /* 4 */["numDI" => '2.1',  "nombreDI" => 'Subdirección de Planeación y Finanzas Corporativas del FIRA', "padreDI" => '3', "nivelDI" => '2'],

            /* 5 */["numDI" => '3',    "nombreDI" => 'Petroleos Mexicanos (PEMEX)', "padreDI" => '0', "nivelDI" => '1'],
            /* 6 */["numDI" => '3.1',  "nombreDI" => 'Gerencia de Integración de Información Institucional de Petróleos Mexicanos', "padreDI" => '5', "nivelDI" => '2'],

            /* 7 */["numDI" => '4',    "nombreDI" => 'Comisión Federal de Electricidad (CFE)', "padreDI" => '0', "nivelDI" => '1'],
            /* 8 */["numDI" => '4.1',  "nombreDI" => 'Gerencia de la División Centro Sur de la Comisión Federal de Electricidad', "padreDI" => '7', "nivelDI" => '2'],
            /* 9 */["numDI" => '4.2',  "nombreDI" => 'Dirección Corporativa de Operación de la Comisión Federal de Electricidad', "padreDI" => '7', "nivelDI" => '2'],

            /* 10 */["numDI" => '5',    "nombreDI" => 'Seguridad Alimentaría Mexicana (SEGALMEX)', "padreDI" => '0', "nivelDI" => '1'],
            /* 11 */["numDI" => '5.1',  "nombreDI" => 'Dirección General de Seguridad Alimentaría Mexicana (LICONSA)', "padreDI" => '10', "nivelDI" => '2'],

            /* 12 */["numDI" => '6',    "nombreDI" => 'Secretaría de Comunicaciones y Transporte (S.C.T)', "padreDI" => '0', "nivelDI" => '1'],
            /* 13 */["numDI" => '6.1',  "nombreDI" => 'Dirección de Estadística y Cartografía de la Secretaría de Comunicaciones y Transportes', "padreDI" => '12', "nivelDI" => '2'],
            /* 14 */["numDI" => '6.2',  "nombreDI" => 'Dirección General del Centro SCT del Estado de México', "padreDI" => '12', "nivelDI" => '2'],
            /* 15 */["numDI" => '6.3',  "nombreDI" => 'Gerencia Regional de la Zona Centro de Telecomunicaciones de México', "padreDI" => '12', "nivelDI" => '2'],
            /* 16 */["numDI" => '6.4',  "nombreDI" => 'Dirección General del Servicio Postal de México', "padreDI" => '12', "nivelDI" => '2'],

            /* 17 */["numDI" => '7',    "nombreDI" => 'Insitituto Federal de Telecomunicaciones', "padreDI" => '0', "nivelDI" => '1'],
            /* 18 */["numDI" => '7.1',  "nombreDI" => 'Coordinación General de Planeación Estratégica del Instituto Federal de Telecomunicaciones', "padreDI" => '17', "nivelDI" => '2'],
            /* 19 */["numDI" => '7.2',  "nombreDI" => 'Unidad de Concesiones y Servicios del Instituto Federal de Telecomunicaciones', "padreDI" => '17', "nivelDI" => '2'],
        ];

        $dependenciasEstatales = [
            /* 20 */["numDI" => '1',    "nombreDI" => 'Secretaría General de Gobierno', "padreDI" => '0', "nivelDI" => '1'],
            /* 21 */["numDI" => '1.0',  "nombreDI" => 'Coordionación de Control de Gestión y Unidad de Información, Planeación, Programación y Evaluación', "padreDI" => '20', "nivelDI" => '2'],
            /* 22 */["numDI" => '1.1',  "nombreDI" => 'Consejo Estatl de Población del Estado de México (COESPO)', "padreDI" => '20', "nivelDI" => '2'],
            /* 23 */["numDI" => '1.2',  "nombreDI" => 'Coordinación General de Protección Civil', "padreDI" => '20', "nivelDI" => '2'],

            /* 24 */["numDI" => '2',    "nombreDI" => 'Secretaría de Seguridad', "padreDI" => '0', "nivelDI" => '1'],
            /* 25 */["numDI" => '2.0',  "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación', "padreDI" => '24', "nivelDI" => '2'],
            /* 26 */["numDI" => '2.1',  "nombreDI" => 'Dirección General de Seguridad Pública y Transito', "padreDI" => '24', "nivelDI" => '2'],
            /* 27 */["numDI" => '2.2',  "nombreDI" => 'Dirección General de Prevencción y Readaptación Social', "padreDI" => '24', "nivelDI" => '2'],
            /* 28 */["numDI" => '2.3',  "nombreDI" => 'Insitituto Mexiquense de Seguridad y Justicia', "padreDI" => '24', "nivelDI" => '2'],
            
            /* 29 */["numDI" => '3',    "nombreDI" => 'Secretaría de Finanzas', "padreDI" => '0', "nivelDI" => '1'],
            /* 30 */["numDI" => '3.0',  "nombreDI" => 'Dirección General de Información, Planeación, Programación y Evaluación', "padreDI" => '29', "nivelDI" => '2'],
            /* 31 */["numDI" => '3.1',  "nombreDI" => 'Direción General de Recaudación', "padreDI" => '29', "nivelDI" => '2'],
            /* 32 */["numDI" => '3.2',  "nombreDI" => 'Contaduría General Gubernamental', "padreDI" => '29', "nivelDI" => '2'],

            /* 33 */["numDI" => '4',    "nombreDI" => 'Secretaría de Salud', "padreDI" => '0', "nivelDI" => '1'],
            /* 34 */["numDI" => '4.0',  "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación de la Secretaría de Salud', "padreDI" => '33', "nivelDI" => '2'],
            /* 35 */["numDI" => '4.1',  "nombreDI" => 'Insituto de Salud del Estado de México (ISEM)', "padreDI" => '33', "nivelDI" => '2'],
            /* 36 */["numDI" => '4.2',  "nombreDI" => 'Sistema para el Desarrollo Integral de la Familia (DIFEM)', "padreDI" => '33', "nivelDI" => '2'],
            /* 37 */["numDI" => '4.3',  "nombreDI" => 'Instituto Materno Infamtil del Estado de México (IMIEM)', "padreDI" => '33', "nivelDI" => '2'],
            /* 38 */["numDI" => '4.4',  "nombreDI" => 'Instituto Mexicano del Seguro Social (IMSS-OTE)', "padreDI" => '33', "nivelDI" => '2'],
            /* 39 */["numDI" => '4.5',  "nombreDI" => 'Instituto Mexicano del Seguro Social (IMSS-PTE)', "padreDI" => '33', "nivelDI" => '2'],
            /* 40 */["numDI" => '4.6',  "nombreDI" => 'Delegación del Instituto de Seguridad y Servicios Sociales de los Taabajadores del Estado (ISSTE)', "padreDI" => '33', "nivelDI" => '2'],
            /* 41 */["numDI" => '4.7',  "nombreDI" => 'Instituto de Seguridad Social Social del Estado de México y Municipios (ISSEMyN)', "padreDI" => '33', "nivelDI" => '2'],

            /* 42 */["numDI" => '5',    "nombreDI" => 'Secretaría del Trabajo', "padreDI" => '0', "nivelDI" => '1'],
            /* 43 */["numDI" => '5.0',  "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación', "padreDI" => '42', "nivelDI" => '2'],
            /* 44 */["numDI" => '5.1',  "nombreDI" => 'Dirección General de Empleo y Productividad', "padreDI" => '42', "nivelDI" => '2'],
            /* 45 */["numDI" => '5.2',  "nombreDI" => 'Instituto de Capacitación y Adiestramiento para el Trbajo Industrial (ICATI)', "padreDI" => '42', "nivelDI" => '2'],
            /* 46 */["numDI" => '5.3',  "nombreDI" => 'Junta local de Conciliación y Arbitraje del Valle Cuatitlan-Texcoco', "padreDI" => '42', "nivelDI" => '2'],
            /* 47 */["numDI" => '5.4',  "nombreDI" => 'Junta local de Conciliación y Arbitraje del Valle de Toluca', "padreDI" => '42', "nivelDI" => '2'],

            /* 48 */["numDI" => '6',    "nombreDI" => 'Secretaría de Educación, Ciencia, Tecnología e Innovación', "padreDI" => '0', "nivelDI" => '1'],
            /* 49 */["numDI" => '6.0',  "nombreDI" => 'Dirección General de Información, Planeación, Programación y Evaluación', "padreDI" => '48', "nivelDI" => '2'],
            /* 50 */["numDI" => '6.1',  "nombreDI" => 'Dirección de Información y Planeación', "padreDI" => '48', "nivelDI" => '2'],
            /* 51 */["numDI" => '6.2',  "nombreDI" => 'Dirección General de Cultura Física y Deporte', "padreDI" => '48', "nivelDI" => '2'],

            /* 52 */["numDI" => '7',    "nombreDI" => 'Secretaría de Bienestar', "padreDI" => '0', "nivelDI" => '1'],
            /* 53 */["numDI" => '7.0',  "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación', "padreDI" => '52', "nivelDI" => '2'],
            /* 54 */["numDI" => '7.1',  "nombreDI" => 'Junta de Asistencia Privada del Estado de México', "padreDI" => '21', "nivelDI" => '2'],
            /* 55 */["numDI" => '7.2',  "nombreDI" => 'Consejo Estatal para el Desarrollo Integral de los Pueblos Indígenas del Estado de México (CEDIPIEM)', "padreDI" => '52', "nivelDI" => '2'],
            
            /* 56 */["numDI" => '8',    "nombreDI" => 'Secretaría de Desarrollo Urbano e Infraestructura', "padreDI" => '0', "nivelDI" => '1'],
            /* 57 */["numDI" => '8.0',  "nombreDI" => 'Unidad De Información, Planeación, Programación y Evaluación ', "padreDI" => '56', "nivelDI" => '2'],
            /* 58 */["numDI" => '8.1',  "nombreDI" => 'Dirección de Operación Urbana', "padreDI" => '56', "nivelDI" => '2'],
            /* 59 */["numDI" => '8.2',  "nombreDI" => 'Dirección de Promoción y Fomento a la Vivienda', "padreDI" => '56', "nivelDI" => '2'],

            /* 60 */["numDI" => '9',    "nombreDI" => 'Secretaría del Campo', "padreDI" => '0', "nivelDI" => '1'],
            /* 61 */["numDI" => '9.0',  "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación ', "padreDI" => '60', "nivelDI" => '2'],
            /* 62 */["numDI" => '9.1',  "nombreDI" => 'PROBOSQUE', "padreDI" => '60', "nivelDI" => '2'],

            /* 63 */["numDI" => '10',   "nombreDI" => 'Secretaría de Desarrollo Economico', "padreDI" => '0', "nivelDI" => '1'],
            /* 64 */["numDI" => '10.0', "nombreDI" => 'Unidad de Planeación e Igualdad de Género ', "padreDI" => '63', "nivelDI" => '2'],
            /* 65 */["numDI" => '10.1', "nombreDI" => 'Dirección General de Comercio', "padreDI" => '63', "nivelDI" => '2'],
            /* 66 */["numDI" => '10.2', "nombreDI" => 'Dirección General del Instituto de Fomento Minero y Estudios Geológicos del Estado De México', "padreDI" => '63', "nivelDI" => '2'],

            /* 67 */["numDI" => '11',   "nombreDI" => 'Secretaría de Cultura y Turismo', "padreDI" => '0', "nivelDI" => '1'],
            /* 68 */["numDI" => '11.0', "nombreDI" => 'Unidad de Planeación, Programación y Evaluación', "padreDI" => '67', "nivelDI" => '2'],
            /* 69 */["numDI" => '11.1', "nombreDI" => 'Dirección General del Instituto Mexiquense de Cultura (IMC)', "padreDI" => '67', "nivelDI" => '2'],
            /* 70 */["numDI" => '11.3', "nombreDI" => 'Dirección General de Turismo', "padreDI" => '67', "nivelDI" => '2'],
            /* 71 */["numDI" => '11.4', "nombreDI" => 'Instituto de Investigación y Fomento de las Artesanias del Estado de México', "padreDI" => '67', "nivelDI" => '2'],

            /* 72 */["numDI" => '12',   "nombreDI" => 'Secretaría de la Contraloría', "padreDI" => '0', "nivelDI" => '1'],
            /* 73 */["numDI" => '12.0', "nombreDI" => 'Unidad de Planeación y Evaluación Institucional', "padreDI" => '72', "nivelDI" => '2'],
            /* 74 */["numDI" => '12.1', "nombreDI" => 'Dirección General de Responsabilidades', "padreDI" => '72', "nivelDI" => '2'],
            /* 75 */["numDI" => '12.2', "nombreDI" => 'Dirección de Control y Evaluación', "padreDI" => '72', "nivelDI" => '2'],

            /* 76 */["numDI" => '13',   "nombreDI" => 'Secretaría de Medio Ambiente y Desarrollo Sostenible', "padreDI" => '0', "nivelDI" => '1'],
            /* 77 */["numDI" => '13.0', "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación ', "padreDI" => '76', "nivelDI" => '2'],
            /* 78 */["numDI" => '13.1', "nombreDI" => 'Comisión Estatal de Parques Naturales y de la Fauna (CEPANAF)', "padreDI" => '76', "nivelDI" => '2'],
            /* 79 */["numDI" => '13.2', "nombreDI" => 'Coordinación General de Conservación Ecológica', "padreDI" => '76', "nivelDI" => '2'],
            /* 80 */["numDI" => '13.3', "nombreDI" => 'Dirección General de Prevención y Control de la Contaminación Atmosférica', "padreDI" => '76', "nivelDI" => '2'],
            /* 81 */["numDI" => '13.4', "nombreDI" => 'Dirección General de Ordenamiento e Impacto Ambiental', "padreDI" => '76', "nivelDI" => '2'],
            /* 82 */["numDI" => '13.5', "nombreDI" => 'Dirección General de Manejo Integral de Residuos', "padreDI" => '76', "nivelDI" => '2'],
            /* 83 */["numDI" => '13.6', "nombreDI" => 'Dirección General de Concertación y Participación Ciudadana', "padreDI" => '76', "nivelDI" => '2'],
            /* 84 */["numDI" => '13.7', "nombreDI" => 'Procuraduría de Protección al Ambiente', "padreDI" => '76', "nivelDI" => '2'],
            /* 85 */["numDI" => '13.8', "nombreDI" => 'Instituto Estatal de Energía y Cambio Climático', "padreDI" => '76', "nivelDI" => '2'],

            /* 86 */["numDI" => '14',   "nombreDI" => 'Secretaría del Agua', "padreDI" => '0', "nivelDI" => '1'],
            /* 87 */["numDI" => '14.0', "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación ', "padreDI" => '86', "nivelDI" => '2'],
            /* 88 */["numDI" => '14.1', "nombreDI" => 'Comisión del Agua del Estado de México (CAEM)', "padreDI" => '86', "nivelDI" => '2'],

            /* 89 */["numDI" => '15',   "nombreDI" => 'Secretaría de las Mujeres', "padreDI" => '0', "nivelDI" => '1'],
            /* 90 */["numDI" => '15.0', "nombreDI" => 'Unidad de Planeación, Programación y Evaluación', "padreDI" => '89', "nivelDI" => '2'],
            /* 91 */["numDI" => '15.1', "nombreDI" => 'Dirección General de Igualdad Sustantiva', "padreDI" => '89', "nivelDI" => '2'],
            /* 92 */["numDI" => '15.2', "nombreDI" => 'Dirección General de Perspectiva de Género', "padreDI" => '89', "nivelDI" => '2'],
            /* 93 */["numDI" => '15.3', "nombreDI" => 'Dirección General de Prevención y Atención a la Violencia', "padreDI" => '89', "nivelDI" => '2'],
            
            /* 94 */["numDI" => '16',   "nombreDI" => 'Secretaría de Movilidad', "padreDI" => '0', "nivelDI" => '1'],
            /* 95 */["numDI" => '16.0', "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación de la Secretaría de Salud', "padreDI" => '94', "nivelDI" => '2'],
            /* 96 */["numDI" => '16.1', "nombreDI" => 'Dirección del Registro Público de Transporte', "padreDI" => '94', "nivelDI" => '2'],
            /* 97 */["numDI" => '16.2', "nombreDI" => 'Dirección General de Vialidad', "padreDI" => '94', "nivelDI" => '2'],
            /* 98 */["numDI" => '16.3', "nombreDI" => 'Dirección General de la Junta de Caminos del Estado de México', "padreDI" => '94', "nivelDI" => '2'],
            /* 99 */["numDI" => '16.4', "nombreDI" => 'Dirección General del Sistema de Autopistas, Aeropuertos, Servicios Conexos y Auxiliares del Estado de México', "padreDI" => '94', "nivelDI" => '2'],
            /* 100 */["numDI" => '16.5', "nombreDI" => 'Director General del Sistema de Transporte Masivo y Teleférico del Estado de México ', "padreDI" => '94', "nivelDI" => '2'],

            /* 101 */["numDI" => '17',   "nombreDI" => 'Consejería Jurídica', "padreDI" => '0', "nivelDI" => '1'],
            /* 102 */["numDI" => '17.0', "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación', "padreDI" => '101', "nivelDI" => '2'],
            /* 103 */["numDI" => '17.1', "nombreDI" => 'Dirección General del Registro Civil del Estado de México', "padreDI" => '101', "nivelDI" => '2'],
            /* 104 */["numDI" => '17.2', "nombreDI" => 'Instituto de la Función Registral', "padreDI" => '101', "nivelDI" => '2'],
            /* 105 */["numDI" => '17.3', "nombreDI" => 'Instituto de la Defensoría Pública', "padreDI" => '101', "nivelDI" => '2'],

            /* 106 */["numDI" => '18',   "nombreDI" => 'Oficialía Mayor', "padreDI" => '0', "nivelDI" => '1'],
            /* 107 */["numDI" => '18.0', "nombreDI" => 'Dirección General de Personal', "padreDI" => '106', "nivelDI" => '2'],

            /* 108 */["numDI" => '19',   "nombreDI" => 'Físcalia General de Justicia del Estado de México', "padreDI" => '0', "nivelDI" => '1'],
            /* 109 */["numDI" => '19.0', "nombreDI" => 'Dirección General de Información, Planeación, Programación y Evaluación', "padreDI" => '108', "nivelDI" => '2'],
            /* 110 */["numDI" => '19.1', "nombreDI" => 'Departamento de Evaluación y Estadística', "padreDI" => '108', "nivelDI" => '2'],
            /* 111 */["numDI" => '19.2', "nombreDI" => 'Dirección General de Administración', "padreDI" => '108', "nivelDI" => '2'],
            /* 112 */["numDI" => '16.3', "nombreDI" => 'Dirección General Juridica y Consultiva', "padreDI" => '108', "nivelDI" => '2'],
            /* 113 */["numDI" => '19.4', "nombreDI" => 'Comisaria de la Policia Ministerial', "padreDI" => '108', "nivelDI" => '2'],
            /* 114 */["numDI" => '19.5', "nombreDI" => 'Fiscalia Especializada en Combate a la Corrupción', "padreDI" => '108', "nivelDI" => '2'],
            /* 115 */["numDI" => '19.6', "nombreDI" => 'Coordinación General de Servicios Periciales', "padreDI" => '108', "nivelDI" => '2'],

            /* 116 */["numDI" => '20',   "nombreDI" => 'Sistema para el Desarrollo  Integral de la Familia en el Estado de México (SDIFEM)', "padreDI" => '0', "nivelDI" => '1'],
            /* 117 */["numDI" => '20.0', "nombreDI" => 'Unidad de Planeación, Programación y Evaluación', "padreDI" => '116', "nivelDI" => '2'],
            /* 118 */["numDI" => '20.1', "nombreDI" => 'Dirección de Alimentación y Nutrición Familiar', "padreDI" => '116', "nivelDI" => '2'],
            /* 119 */["numDI" => '20.2', "nombreDI" => 'Dirección de Atención a la Discapacidad', "padreDI" => '116', "nivelDI" => '2'],
            /* 120 */["numDI" => '20.3', "nombreDI" => 'Dirección de Servicios Jurídico - Asistenciales', "padreDI" => '116', "nivelDI" => '2'],
            /* 121 */["numDI" => '20.4', "nombreDI" => 'Dirección de Prevención y Bienestar Familiar', "padreDI" => '116', "nivelDI" => '2'],
            /* 122 */["numDI" => '20.5', "nombreDI" => 'Coordinación de Atención a Adultos Mayores y Grupos Indigenas', "padreDI" => '116', "nivelDI" => '2'],

            /* 123 */["numDI" => '21',   "nombreDI" => 'Órgano Superior de Fiscalización del Estado de México', "padreDI" => '0', "nivelDI" => '1'],
            /* 124 */["numDI" => '21.0', "nombreDI" => 'Órgano Superior de Fiscalización del Estado de México (OSFEM)', "padreDI" => '123', "nivelDI" => '2'],

            /* 125 */["numDI" => '22',   "nombreDI" => 'Instituto de Seguridad Social del Estado de México y Municipios (ISSEMyM)', "padreDI" => '0', "nivelDI" => '1'],
            /* 126 */["numDI" => '22.0', "nombreDI" => 'Unidad de Información, Planeación, Programación y Evaluación', "padreDI" => '125', "nivelDI" => '2'],

            /* 127 */["numDI" => '23',   "nombreDI" => 'Poder Judicial del Estado de México', "padreDI" => '0', "nivelDI" => '1'],
            /* 128 */["numDI" => '23.0', "nombreDI" => 'Dirección General de Finanzas y Planeación', "padreDI" => '127', "nivelDI" => '2'],

            /* 129 */["numDI" => '24',   "nombreDI" => 'Poder  Legislativo del Estado de México', "padreDI" => '0', "nivelDI" => '1'],
            /* 130 */["numDI" => '24.0', "nombreDI" => 'Poder Legislativo del Estado de México', "padreDI" => '129', "nivelDI" => '2'],
            /* 131 */["numDI" => '24.1', "nombreDI" => 'Dirección de Administración y Desarrollo de Personal', "padreDI" => '129', "nivelDI" => '2'],
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
