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

    public function index() {
        $grupos = Grupo::where('grupo_nivel', '=', '2')->get();
        return view('index')->with([
            'grupos' => $grupos
        ]);
    }

    public function listGrupos() {
        $grupos = Grupo::where('grupo_nivel', '=', '2')->get();
        return response()->json($grupos);
    }

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

        $infoSector = Grupo::find($request->get('sector_id'));
        $temas = Grupo::where('grupo_padre', '=', $request->get('sector_id'))->whereHas('rolesTema', function ($query) use ($rol) {
            $query->where('id', $rol);
        })->get();

        return view('grupos/listTemas2')->with([
            'infoSector'    => $infoSector,
            'temas'         => $temas,
        ]);
    }

    public function listCE(Request $request) {

        $tema = Grupo::find($request->get('tema_id'));
        $cuadrosEstadisticos = CuadroEstadistico::where('tema_id', '=', $request->get('tema_id'))->with('informante')->get();
        $dependencias = DependenciaInformante::where('nivelDI', '1')->orderBy('tipoDI')->get();
        
        return view('grupos/listCuadrosEstadisticos2')->with([
            'tema' => $tema,
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
        $ce = CuadroEstadistico::find($request->get('idCE'));
        $tema = $ce->tema->nombreGrupo;
        $ruta = 'public/' . $tema . '/' . $ce->numeroCE;


        $archivo = $request->file('fileCE');
        //dd($archivo->getClientOriginalExtension(), $archivo->getMimeType());

        if($request->hasfile('fileCE')) {
            $archivo = $request->file('fileCE');
            //$nameFile = $request->get('numeroCE') . '_' . $request->get('yearPost') . '.' . $archivo->getClientOriginalExtension();
            $upload = $archivo->storeAS($ruta, $archivo->getClientOriginalName());
        }

        $archivoCE = CEArchivos::create([
            'ce_id' => $request->get('idCE'),
            'yearPost' => $request->get('yearPost'),
            'nombreArchivo' => $archivo->getClientOriginalName(),
            'urlFile' => Storage::url($upload)
        ]);
        
        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Archivo guardado correctamente :)');

        return redirect()->route('home');
    }

    public function downloadFileCE(Request $request) {
        $file = CEArchivos::find($request->get('idFile'));
        $pathFile = $file->ce->tema->nombreGrupo . '/' . $file->ce->numeroCE . '/' . $file->nombreArchivo;
        return Storage::download('public/'.$pathFile);
    }
}
