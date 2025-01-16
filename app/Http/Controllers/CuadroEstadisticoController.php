<?php

namespace App\Http\Controllers;

use App\Models\CuadroEstadistico;
use App\Models\Grupo;
use App\Models\UnidadInformativa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CuadroEstadisticoController extends Controller {

    public function listGrupos() {
        $grupos = Grupo::where('grupo_nivel', '=', '2')->get();
        return view('index')->with([
            'grupos/listGrupos2'     => $grupos,
        ]);
    }

    /* public function dependeciaAreas(Request $request) {
        $areas = AreasUnidad::where('unidad_id', $request->get('unidad_id'))->get();
        foreach($areas as $area) {
            $areasArray[$area->id] = $area->nombreArea;
        }

        return response()->json($areasArray);
    } */

    public function listSectores(Request $request) {
        $user = Auth::user();
        $rol = $user->roles->pluck('id');

        $sectores = Grupo::where('grupo_padre', '=', $request->get('grupo_id'))->whereHas('temas', function ($query) use ($rol) {
            $query->whereHas('rolesTema', function ($subquery) use ($rol) {
                $subquery->where('id', $rol);
            });
        })->get();

        return view('grupos/listSectores2')->with([
            'numeroGrupo' => $request->get('grupo'),
            'sectores' => $sectores,            
        ]);
    }

    public function listTemas(Request $request) {
        $user = Auth::user();
        $rol = $user->roles->pluck('id');

        $temas = Grupo::where('grupo_padre', '=', $request->get('sector_id'))->whereHas('rolesTema', function ($query) use ($rol) {
            $query->where('id', $rol);
        })->get();

        return view('grupos/listTemas2')->with([
            'numeroSector' => $request->get('sector'),
            'temas' => $temas,
        ]);
    }

    public function listCE(Request $request) {
        $numeroCuadro = $request->get('tema').'.'.(CuadroEstadistico::where('tema_id', $request->get('tema_id'))->count() + 1);
        $ces = Grupo::find($request->get('tema_id'));
        $dependencias = UnidadInformativa::all();
        return view('grupos/listCuadrosEstadisticos2')->with([
            'ce' => $ces,
            'numeroCE' => $numeroCuadro,
            'dependencias' => $dependencias
        ]);
    }

    public function listArchivosCE(Request $request) {
        $cuadroEstadistico = CuadroEstadistico::findOrFail($request->get('ce_id'));
        return view("grupos/archivosCuadroEstadistico")->with([
            'cuadroEstadistico' => $cuadroEstadistico,
        ]);
    }

    public function storeCE(Request $request){
        //dd($request);
        $ce = CuadroEstadistico::create([
            "numeroCE" => $request->get('numero_ce'),
            "dependencia_id" => $request->get('area_id'),
            "tema_id" => $request->get('tema_id'),
            "nombreCuadroEstadistico" => $request->get('nombreCuadroEstadistico'),
            "gradoDesagregacion" => $request->get('gradoDesagregacion'),
            "frecuenciaAct" => $request->get('frecuenciaAct'),
        ]);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Cuadro Estadistico Agregado Exitosamente !!');
        return redirect()->route('home');
    }
}
