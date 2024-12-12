<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Sector;
use App\Models\Temas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function grupos() {
        $grupos = Grupo::all();
        return view('index')->with([
            'grupos'     => $grupos,
        ]);
    }

    public function sectores(Request $request) {
        $grupo = Grupo::find($request->get('grupo_id'));
        $sectores = Sector::where('grupo_id', '=', $grupo->id)->get();
        //return response()->json($sectores);
        return view('components/radio-sector')->with([
            'grupo' => $grupo,
            'sectores' => $sectores
        ]);
    }

    public function temas(Request $request) {
        $sector = $request->get('sector_id');
        $temas = Temas::where('sector_id', $sector)->get();
        return view('components/radio-tema')->with([
            'temas' => $temas
        ]);
    }

    public function cuadroEstadistico(Request $request) {
        $tema = Temas::find($request->get('tema_id'));
        return view('components/cuadro-estadistico')->with([
            'tema' => $tema
        ]);
    }

    public function archivos(Request $request) {
        return view("compoents/archivos_cuadro_estadistico")
            ->with([
                'id' => $request->get('idCuadro'),
            ]);
    }
}