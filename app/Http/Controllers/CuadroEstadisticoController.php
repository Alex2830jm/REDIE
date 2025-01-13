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

    public function listSectores(Request $request) {
        $user = Auth::user();
        $rol = $user->roles->pluck('id');
        $id_grupo = $request->get('id');
        $grupo = Grupo::find($id_grupo);
        $numeroGrupo = $request->get('grupo');

        $sectores = Grupo::where('grupo_padre', '=', $id_grupo)->whereHas('rolesSector', function ($query) use ($rol) {
            $query->where('id', $rol);
        })->get();

        return view('grupos/listSectores2')->with([
            'numeroGrupo' => $numeroGrupo,
            'grupo' => $grupo,
            'sectores' => $sectores,            
        ]);
    }

    public function listTemas(Request $request) {
        $user = Auth::user();
        $rol = $user->roles->pluck('id');
        $id_sector = $request->get('id');
        $sector = Grupo::find($id_sector);
        $numeroSector = $request->get('sector');

        $temas = Grupo::where('grupo_padre', '=', $id_sector)->whereHas('rolesTema', function ($query) use ($rol) {
            $query->where('id', $rol);
        })->get();

        return view('grupos/listTemas2')->with([
            'numeroSector' => $numeroSector,
            'sector' => $sector,
            'temas' => $temas,
        ]);
    }

    public function listCE(Request $request) {
        $temaId = $request->get('id');
        $numeroCuadro = $request->get('tema').'.'. (CuadroEstadistico::where('tema_id', $temaId)->count() + 1);
        //dd($numeroCuadro);
        $tema = Grupo::findOrFail($temaId);
        $ces = CuadroEstadistico::where('tema_id', $temaId)->get();
        $dependencias = UnidadInformativa::all();
        return view('grupos/listCuadrosEstadisticos2')->with([
            'tema' => $tema,
            'cuadros_estadisticos' => $ces,
            'numeroCE' => $numeroCuadro,
            'dependencias' => $dependencias
        ]);
    }

    public function listArchivosCE(Request $request) {
        $cuadroEstadistico = CuadroEstadistico::findOrFail($request->get('id'));
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
