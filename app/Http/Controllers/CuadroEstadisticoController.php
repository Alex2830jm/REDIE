<?php

namespace App\Http\Controllers;

use App\Models\CEArchivos;
use App\Models\CuadroEstadistico;
use App\Models\DependenciaInformante;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CuadroEstadisticoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ce.listGrupos'), 403);
        $user = Auth::user();
        $rol = $user->roles->pluck('id');

        $grupos = Grupo::where('grupo_nivel', '=', '2')
            ->with('sectores', function ($query) use ($rol) {
                $query->whereHas('temas', function ($q) use ($rol) {
                    $q->whereHas('rolesTema', function ($subquery) use ($rol) {
                        $subquery->where('id', $rol);
                    });
                })->orderBy('id', 'ASC');
            })
            ->get();
        return view('index')->with([
            'grupos' => $grupos
        ]);
    }

    public function listTemas(Request $request)
    {
        abort_if(Gate::denies('ce.listTemas'), 403);
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

    public function listCE(String $ce, Request $request)
    {
        abort_if(Gate::denies('ce.listCE'), 403);
        $tema = Grupo::find($ce);
        $cuadrosEstadisticos = CuadroEstadistico::where('tema_id', '=', $ce)
            ->with('informante')
            ->paginate(10);
        $dependencias = DependenciaInformante::select('id', 'tipoDI', 'numDI', 'nombreDI', 'padreDI', 'nivelDI')
            ->orderBy('tipoDI')
            ->orderBy('id', 'ASC')
            ->get();
        return view('grupos/listCuadrosEstadisticos2')->with([
            'tema' => $tema,
            'cuadrosEstadisticos' => $cuadrosEstadisticos,
            'dependencias' => $dependencias
        ]);
    }

    public function listCEPaginate(String $tema, Request $request)
    {
        abort_if(Gate::denies('ce.listCEPaginate'), 403);
        $cuadrosEstadisticos = CuadroEstadistico::where('tema_id', '=', $tema)
            ->orderBy('id', 'ASC')
            ->with(['informante', 'informante.dependencia'])
            ->paginate(10);


        return response()->json([
            'cuadrosEstadisticos' => $cuadrosEstadisticos,
        ]);
    }

    public function storeCE(Request $request)
    {
        abort_if(Gate::denies('ce.storeCE'), 403);
        //dd($request);
        $ce = CuadroEstadistico::create([
            "numeroCE" => $request->get('numero_ce'),
            "tema_id" => $request->get('tema_id'),
            "di_id" => $request->get('di_id'),
            'ui_id' => $request->get('ui_id'),
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

    public function listArchivosCE(Request $request)
    {
        abort_if(Gate::denies('ce.listArchivos'), 403);
        $cuadroEstadistico = CuadroEstadistico::findOrFail($request->get('ce_id'));
        $cuadroEstadistico->archivos;
        return response()->json($cuadroEstadistico);
    }

    public function viewFile(Request $request)
    {
        abort_if(Gate::denies('ce.viewFile'), 403);
        $file = CEArchivos::find($request->get('idFile'));
        return response()->json($file);
    }

    public function saveFile(Request $request)
    {
        abort_if(Gate::denies('ce.saveFile'), 403);
        //dd($request);
        $ce = CuadroEstadistico::findOrFail($request->get('idCE'));

        if (!$request->hasFile('fileCE')) {
            return response()->json(['error' => 'No se recibió ningún archivo'], 400);
        }

        $file = $request->file('fileCE');

        $temaPadrePadre = optional($ce->tema->padre)->padre;
        $temaPadre = optional($ce->tema)->padre;

        $grupo = optional($temaPadrePadre)->numGrupo . '.-' . optional($temaPadrePadre)->nombreGrupo;
        $sector = optional($temaPadre)->numGrupo . '.-' . optional($temaPadre)->nombreGrupo;
        $tema = optional($ce->tema)->numGrupo . '.-' . optional($ce->tema)->nombreGrupo;

        $fileName = $request->get('yearPost') . '.' . $file->getClientOriginalExtension();
        $rutaFile = "public/{$grupo}/{$sector}/{$tema}/{$ce->numeroCE}";

        $filePath = $file->storeAs($rutaFile, $fileName);

        $archivoCE = CEArchivos::create([
            'ce_id' => $ce->id,
            'yearPost' => $request->get('yearPost'),
            'nombreArchivo' => $fileName,
            'urlFile' => Storage::url($filePath)
        ]);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Archivo Guardado Correctamente');

        return redirect()->route('home');
    }

    public function downloadFileCE(Request $request)
    {
        abort_if(Gate::denies('ce.downloadFileCE'), 403);
        $file = CEArchivos::find($request->get('idFile'));
        $pathFile = $file->ce->tema->nombreGrupo . '/' . $file->ce->numeroCE . '/' . $file->nombreArchivo;
        return Storage::download('public/' . $pathFile);
    }


    //Funciones para la carga masiva de archivos
    public function infoCuadroEstadistico(Request $request)
    {
        //dd($request);

        $numeroCE = explode('.xlsx', $request->get('numero_ce'));
        //dd($numeroCE);

        $ce = CuadroEstadistico::where('numeroCE', '=', $numeroCE)->get();
        //$ce = CuadroEstadistico::find('2');
        return response()->json(['cuadroEstadistico' => $ce]);
    }

    public function storeFiles(Request $request)
    {
        //dd($request);

        if (!$request->file('fileCE')) {
            return response()->json(['error' => 'No se recibio ningún archivo'], 400);
        }

        $index = $request->get('indexFile');
        foreach ($index as $i => $index) {
            $ce = CuadroEstadistico::find($request->get('idCE')[$index]);
            //dd($ce);
            $file = $request->file('fileCE')[$index];

            if ($file->getError()) {
                dd($file->getErrorMessage());
            }

            $temaPadrePadre = optional($ce->tema->padre)->padre;
            $temaPadre = optional($ce->tema)->padre;

            $grupo = optional($temaPadrePadre)->numGrupo . '.-' . optional($temaPadrePadre)->nombreGrupo;
            $sector = optional($temaPadre)->numGrupo . '.-' . optional($temaPadre)->nombreGrupo;
            $tema = optional($ce->tema)->numGrupo . '.-' . optional($ce->tema)->nombreGrupo;

            $fileName = $request->get('yearPost') . '.' . $file->getClientOriginalExtension();
            //$filePath = "public/{$grupo}/{$sector}/{$tema}/{$ce->numeroCE}";
            $filePath = "public/" . $grupo . "/" . $sector . "/" . $tema . "/" . $ce->numeroCE;


            $fileStore = $file->storeAs($filePath, $fileName);

            CEArchivos::create([
                'ce_id' => $ce->id,
                'yearPost' => $request->get('yearPost'),
                'nombreArchivo' => $ce->numeroCE . '_' . $fileName,
                'urlFile' => Storage::url($fileStore)
            ]);
        }

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Archivos Guardados Correctamente');

        return redirect()->route('home');
    }
}
