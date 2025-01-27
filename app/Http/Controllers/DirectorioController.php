<?php

namespace App\Http\Controllers;

use App\Models\AreasUnidad;
use App\Models\Dependencia;
use App\Models\PersonaUnidad;
use App\Models\UnidadInformativa;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{


    public function listDependencias(Request $request) {
        $dependencias = Dependencia::where('tipo_dependencia', '=', $request->get('type'))->get();
        return view('directorio/dependencias')->with([
            'dependencias' => $dependencias
        ]);
    }

    public function listUnidades(string $id) {
        $dependencia = Dependencia::find($id);
        return view('directorio/unidades')->with([
            'dependencia' => $dependencia,
        ]);
    }

    public function infoPersonas(Request $request) {
        $tipo = $request->get('tipo');
        $id = $request->get('id');
        
        if ($tipo == 'dependencia') {
            $personas = PersonaUnidad::where('dependencia_id', $id)->get();
        } else if ($tipo === 'unidad') {
            $personas = PersonaUnidad::where('unidad_id', $id)->get();
        }
        return view('directorio/infoPersonas')->with([
            'personas' => $personas
        ]);
    }

    public function create() {
        return view('directorio/create');
    }

    public function store(Request $request) {
        //dd($request);

        $dependencia = Dependencia::create([
            'tipo_dependencia' => $request->get('tipo'),
            'nombreDependencia' => $request->get('nombreDependencia'),
            'domicilioDependencia' => $request->get('domicilioDependencia'),
        ]);

        if($request->get('tipo') === 'Federal') {
            $index = $request->get('index');
            foreach($index as $i) {
                $persona = PersonaUnidad::create([
                    'dependencia_id' => $dependencia->id,
                    'nombrePersona' => $request->get('nombrePersonaDependencia')[$i],
                    'profesion' => $request->get('profesionDependencia')[$i],
                    'cargo' => $request->get('cargoAreaDependencia')[$i],
                    'telefono' => $request->get('telefonoDependencia')[$i],
                    'correo' => $request->get('correoDependencia')[$i],
                ]);
            }
        } else if($request->get('tipo') === "Estatal") {
            $indexDep = $request->get('indexDep');
            foreach($indexDep as $i) {
                $personaDep = PersonaUnidad::create([
                    'dependencia_id' => $dependencia->id,
                    'nombrePersona' => $request->get('nombrePersona')[$i],
                    'profesion' => $request->get('profesion')[$i],
                    'area' => $request->get('area')[$i],
                    'cargo' => $request->get('cargoArea')[$i],
                    'telefono' => $request->get('telefono')[$i],
                    'correo' => $request->get('correo')[$i],
                ]);
            }


            $indexUnidad = $request->get('indexUnidad');
            $indexPersonas = $request->get('indexPer');
            foreach($indexUnidad as $index => $i) {
                $unidad = UnidadInformativa::create([
                    'dependencia_id' => $dependencia->id,
                    'nombreUnidad' => $request->get('unidadInformativa')[$index],
                    'direccion' => $request->get('domicilioUnidad')[$index],
                ]);

                foreach($indexPersonas as $j) {
                    $persona = PersonaUnidad::create([
                        'unidad_id' => $unidad->id,
                        'nombrePersona' => $request->get('nombrePersonaUnidad')[$j],
                        'profesion' => $request->get('profesionUnidad')[$j],
                        'area' => $request->get('areaUnidad')[$j],
                        'cargo' => $request->get('cargoAreaUnidad')[$j],
                        'telefono' => $request->get('telefonoUnidad')[$j],
                        'correo' => $request->get('correoUnidad')[$j],
                    ]);
                }
            }
        }

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Los datos se han registrado exitosamente');

        return redirect()->route('directorio.index');
    }
}
