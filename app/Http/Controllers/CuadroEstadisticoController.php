<?php

namespace App\Http\Controllers;

use App\Models\CEArchivos;
use App\Models\CuadroEstadistico;
use App\Models\DependenciaInformante;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $tema = Grupo::find($request->get('tema_id'));
        $cuadrosEstadisticos = CuadroEstadistico::where('tema_id', '=', $request->get('tema_id'))->with('informante')->get();
        $dependencias = DependenciaInformante::where('nivelDI', '1')->orderBy('tipoDI')->get();
        


        return view('grupos/listCuadrosEstadisticos2')->with([
            'tema' => $tema,
            'numeroCE' => $numeroCuadro,
            'cuadrosEstadisticos' => $cuadrosEstadisticos,
            'dependencias' => $dependencias
        ]);
    }

    public function listArchivosCE(Request $request) {
        $cuadroEstadistico = CuadroEstadistico::findOrFail($request->get('ce_id'));
        $cuadroEstadistico->archivos;
        return response()->json($cuadroEstadistico);
    }

    public function infoCE(Request $request) {
        $cuadroEstadistico = CuadroEstadistico::findOrFail($request->get('ce_id'));
        return response()->json($cuadroEstadistico);
    }

    public function storeCE(Request $request){
        //dd($request);
        $dependencia = explode("_", $request->get('dependencia'));
        $origenCE = $dependencia[0] === "federal"
            ? ['di_id' => $dependencia[1]]
            : ['di_id' => $request->get('unidad_id')];

        $ce = CuadroEstadistico::create($origenCE + [
            "numeroCE" => $request->get('numero_ce'),
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


    
    public function saveArchives(Request $request) {
        //dd($request);

        if($request->hasfile('fileCE')) {
            $archivo = $request->file('fileCE');
            $nameFile = $request->get('ce') . '_' . $request->get('yearPost') . '.' . $archivo->getClientOriginalExtension();
            $upload = $archivo->storeAS('public/archivos', $nameFile);
        }

        $archivoCE = CEArchivos::create([
            'ce_id' => $request->get('ce_id'),
            'yearPost' => $request->get('yearPost'),
            'nombreArchivo' => $nameFile,
            'urlFile' => Storage::url($upload)
        ]);
        
        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Archivo guardado correctamente :)');
        return redirect()->route('home');
    }


    public function downloadFileCE(Request $request) {
        $file = CEArchivos::find($request->get('archivo_id'));
        //dd($file);
        //return Storage::download('assets/archivos/'.$file->nombreArchivo);
        return Storage::download('public/archivos/'.$file->nombreArchivo);
    }
}
