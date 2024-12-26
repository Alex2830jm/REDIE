<?php

namespace App\Http\Controllers;

use App\Models\CuadroEstadistico;
use App\Models\Grupo;
use Illuminate\Http\Request;

class CuadroEstadisticoController extends Controller
{
    public function listCE(Request $request) {
        $temaId = $request->get('id');
        $numeroCuadro = $request->get('tema').'.'. (CuadroEstadistico::where('tema_id', $temaId)->count() + 1);
        //dd($numeroCuadro);
        $tema = Grupo::findOrFail($temaId);
        $ces = CuadroEstadistico::where('tema_id', $temaId)->get();
        return view('grupos/listCuadrosEstadisticos2')->with([
            'tema' => $tema,
            'cuadros_estadisticos' => $ces,
            'numeroCE' => $numeroCuadro
        ]);
    }

    public function store(Request $request){
        //dd($request);
        $ce = CuadroEstadistico::create([
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
}
