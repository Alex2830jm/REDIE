<?php

namespace App\Http\Controllers;

use App\Models\DependenciaInformante;
use App\Models\PersonaUnidad;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{


    public function listDependencias(Request $request) {
        $dependencias = DependenciaInformante::where('tipoDI', '=', $request->get('type'))->get();
        return view('directorio/dependencias')->with([
            'dependencias' => $dependencias
        ]);
    }

    public function listUnidades(string $id) {
        $dependencia = DependenciaInformante::find($id);
        return view('directorio/unidades')->with([
            'dependencia' => $dependencia,
        ]);
    }

    public function infoPersonas(Request $request) {
        $tipo = $request->get('tipo');
        $id = $request->get('id');
        
        $personas = PersonaUnidad::where('di_id', $id)->get();
        return view('directorio/infoPersonas')->with([
            'personas' => $personas
        ]);
    }

    public function unidadesCE(Request $request) {
        $dependencia_id = $request->get('dependencia_id');
        $dependencia = DependenciaInformante::find($dependencia_id);
        foreach($dependencia->unidades as $key => $unidad) {
            $unidadArray[$key] = [
                'id' => $unidad->id,
                'unidad' => $unidad->nombreDI
            ];
        }

        return response()->json($unidadArray);
    }

    public function create() {
        return view('directorio/create');
    }

    public function store(Request $request) {
        //dd($request);
        $dependencia = DependenciaInformante::create([
            'tipoDI' => $request->get('tipo_dependencia'),
            'nombreDI' => $request->get('nombreDependencia'),
            'domicilioDI' => $request->get('domicilioDependencia'),
            'nivelDI' => 1
        ]);

        $unidades = $request->get('indexUnidad');
        $indexUnidad = $request->get('indexUnidad');
        $indexPersona = $request->get('index');

        if(!empty($unidades) > 0) {
            foreach($indexUnidad as $i => $iu) {
                DependenciaInformante::create([
                    'padreDI' => $dependencia->id,
                    'nombreDI' => $request->get('unidadInformativa')[$i],
                    'domicilioDI' => $request->get('domicilioUnidad')[$i],
                    'nivelDI' => 2
                ]);
            }
        }

        foreach($indexPersona as $j => $ip) {
            $tipoInformacion = $request->get('tipoPersona')[$j] === 'dependencia' 
                ? ['dependencia_id' => $dependencia->id] 
                : ['unidad_id' => $dependencia->unidades->pluck('id')[$indexPersona[$j]]];
            
            PersonaUnidad::create($tipoInformacion + [
                "nombrePersona" => $request->get('nombrePersona')[$j],
                "profesion" => $request->get('profesionPersona')[$j],
                "area" => $request->get('areaInformantePersona')[$j],
                "cargo" => $request->get('cargoAreaPersona')[$j],
                "telefono" => $request->get('telefonoContactoPersona')[$j],
                "correo" => $request->get('correoContactoPersona')[$j],
            ]);
        }

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Dependencia agregada al directorio correctamente');

        return redirect()->route('directorio.index');
    }
}
