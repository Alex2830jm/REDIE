<?php

namespace App\Http\Controllers;

use App\Models\AreasUnidad;
use App\Models\PersonaUnidad;
use App\Models\UnidadInformativa;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    public function listUnidades() {
        $unidades = UnidadInformativa::all();
        return view('directorio/index')->with([
            'unidades' => $unidades
        ]);
    }

    public function areasUnidad(Request $request) {
        $unidad = UnidadInformativa::find($request->get('unidad_id'));
        $areas = AreasUnidad::where('unidad_id', $request->get('unidad_id'))->with(['personas'])->get();
        /* return response()->json([
            'unidad' => $unidad,
            'areas' => $areas
        ]); */
        return view('directorio/unidades')->with([
            'unidad' => $unidad,
            'areas' => $areas
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
