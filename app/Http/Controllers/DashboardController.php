<?php

namespace App\Http\Controllers;

use App\Models\CuadroEstadistico;
use App\Models\DependenciaInformante;
use App\Models\Grupo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    //Diseño 1
    public function grupos()
    {
        $grupos = Grupo::where('grupo_nivel', '=', '2')->get();
        return view('index')->with([
            'grupos/listGrupos2'     => $grupos,
        ]);
    }

    public function sectores(Request $request)
    {
        $grupo = $request->get('grupo');
        $grupoSectores = Grupo::find($request->get('id'));
        return view('grupos/listSectores2')->with([
            'grupoSectores' => $grupoSectores,
            'grupo' => $grupo
        ]);
    }

    public function temas(Request $request)
    {
        $sector = $request->get('sector');
        $sectorTemas = Grupo::find($request->get('id'));
        return view('grupos/listTemas2')->with([
            'sectorTemas' => $sectorTemas,
            'sector' => $sector
        ]);
    }

    public function cuadroEstadistico(Request $request)
    {
        $numeroCuadro = $request->get('tema');
        dd($numeroCuadro);
        $tema = Grupo::findOrFail($request->get('id'));
        return view('grupos/listCuadrosEstadisticos2')->with([
            'tema' => $tema
        ]);
    }

    public function archivosCE(Request $request)
    {
        $cuadroEstadistico = CuadroEstadistico::findOrFail($request->get('id'));
        return view("grupos/archivosCuadroEstadistico")->with([
            'cuadroEstadistico' => $cuadroEstadistico
        ]);
    }

    //Diseño2
    public function grupos1()
    {
        $grupos = Grupo::where('grupo_nivel', '=', '2')->get();
        return view('grupos/dashboard')->with([
            'grupos'     => $grupos,
        ]);
    }

    public function sectores1(Request $request)
    {
        $grupoSectores = Grupo::find($request->get('id'));
        return view('grupos/listSectores')->with([
            'grupoSectores' => $grupoSectores
        ]);
    }

    public function temas1(Request $request)
    {
        $sectorTemas = Grupo::find($request->get('id'));
        //return response()->json($sectorTemas);
        return view('grupos/listTemas')->with([
            'sectorTemas' => $sectorTemas
        ]);
    }

    public function cuadroEstadistico2(Request $request)
    {
        $tema = Grupo::where('id', '=', $request->get('id'));
        return view('grupos/listCuadrosEstadisticos')->with([
            'tema' => $tema
        ]);
    }

    public function archivosCE2()
    {
        return view("grupos/archivosCuadroEstadistico");
    }

    public function prueba()
    {
        $user = Auth::user();
        $rol = $user->roles->pluck('id');

        $grupos = Grupo::where('grupo_nivel', '=', '2')
            ->with(['sectores', 'sectores.temas'])
            ->get();
        //return response()->json(['grupos' => $grupos]);
        return view('pruebas')->with(['grupos' => $grupos]);
    }
}
