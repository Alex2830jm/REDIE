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

    public function listUnidades(Request $request) {
        $dependencia = Dependencia::find($request->get('dependencia_id'));
        
        //$dependencia->unidades->personaUnidad;
        //$unidades = UnidadInformativa::where('dependencia_id', $request->get('dependencia_id'))->with(['personasUnidad'])->get();
        //return response()->json($dependencia);
        return view('directorio/unidades')->with([
            'dependencia' => $dependencia,
        ]);
    }

    public function listPersonasAreas(Request $request) {
        $personas = PersonaUnidad::where('area_id', $request->get('area_id'))->get();
        //return response()->json($personas);

        return view('directorio/personas')->with([
            'personas' => $personas
        ]);
    }

    public function infoPersona(Request $request) {
        return response()->json([
            'mensaje' => 'Hola'
        ]);
    }


    public function dependeciaAreas(Request $request) {
        $areas = AreasUnidad::where('unidad_id', $request->get('unidad_id'))->get();
        foreach($areas as $area) {
            $areasArray[$area->id] = $area->nombreArea;
        }

        return response()->json($areasArray);
    }
}
