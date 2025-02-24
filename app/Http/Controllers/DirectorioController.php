<?php

namespace App\Http\Controllers;

use App\Models\Dependencia;
use App\Models\DependenciaInformante;
use App\Models\PersonaUnidad;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{


    public function listDependencias(Request $request)
    {
        $dependencias = DependenciaInformante::where('tipoDI', '=', $request->get('type'))
            ->where('nivelDI', '1')->orderBy('id', 'ASC')->get();
        return view('directorio/dependencias')->with([
            'dependencias' => $dependencias
        ]);
    }

    public function listUnidades(string $id)
    {
        $dependencia = DependenciaInformante::find($id);
        return view('directorio/unidades')->with([
            'dependencia' => $dependencia,
        ]);
    }

    public function infoPersonas(Request $request)
    {
        $tipo = $request->get('tipo');
        $id = $request->get('id');

        $personas = PersonaUnidad::where('di_id', $id)->get();
        return view('directorio/infoPersonas')->with([
            'personas' => $personas
        ]);
    }

    public function unidadesCE(Request $request)
    {
        $dependencia_id = $request->get('dependencia_id');
        $dependencia = DependenciaInformante::find($dependencia_id);
        foreach ($dependencia->unidades as $key => $unidad) {
            $unidadArray[$key] = [
                'id' => $unidad->id,
                'unidad' => $unidad->nombreDI
            ];
        }

        return response()->json($unidadArray);
    }

    public function create()
    {
        return view('directorio/create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $dependencia = DependenciaInformante::create(
            $request->only('tipoDI', 'nombreDI', 'domicilioDI', 'numTelefonoDI') + [
                'nivelDI' => 1
            ]
        );

        $indexPDI = $request->get('nombrePersona_DI');

        foreach ($indexPDI as $i => $PDI) {
            PersonaUnidad::create([
                "di_id" => $dependencia->id,
                "nombrePersona" => $request->get('nombrePersona_DI')[$i],
                "profesionPersona" => $request->get('profesionPersona_DI')[$i],
                "areaPersona" => $request->get('areaPersona_DI')[$i],
                "cargoPersona" => $request->get('cargoPersona_DI')[$i],
                "telefonoPersona" => $request->get('telefonoPersona_DI')[$i],
                "correoPersona" => $request->get('correoPersona_DI')[$i]
            ]);
        }

        $indexUnidad = $request->get('nombreDI_U');

        foreach ($indexUnidad as $i => $DI_U) {
            $UGI = DependenciaInformante::create([
                'padreDI' => $dependencia->id,
                'nombreDI' => $request->get('nombreDI_U')[$i],
                'domicilioDI' => $request->get('domicilioDI_U')[$i],
                'correoDI' => $request->get('correoDI_U')[$i],
                'numTelefonoDI' => $request->get('numTelefonoDI_U')[$i],
                'nivelDI' => 2,
            ]);


            PersonaUnidad::create([
                "di_id" => $UGI->id,
                "nombrePersona" => $request->get('nombrePersona_UGI')[$i],
                "profesionPersona" => $request->get('profesionPersona_UGI')[$i],
                "areaPersona" => $request->get('areaPersona_UGI')[$i],
                "cargoPersona" => $request->get('cargoPersona_UGI')[$i],
                "telefonoPersona" => $request->get('telefonoPersona_UGI')[$i],
                "correoPersona" => $request->get('correoPersona_UGI')[$i]
            ]);
        }

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Dependencia agregada al directorio correctamente');

        return redirect()->route('directorio.index');
    }

    public function updateInfoDependencia(Request $request)
    {
        //dd($request);
        $dependencia = DependenciaInformante::find($request->get('id_di'))->update(
            $request->only('nombreDI', 'domicilioDI', 'numTelefonoDI', 'correoDI')
        );

        $dep = DependenciaInformante::find($request->get('id_di'));
        $id = $dep->nivelDI === 1 ? $dep->id : $dep->dependencia->id;

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Los datos de la dependencia se han actualizado correctamente');

        return redirect()->route('directorio.unidades', $id);
    }

    public function detallesUnidad(Request $request) {
        $dependencia = DependenciaInformante::find($request->get('unidad_id'));
        return response()->json($dependencia);
    }

    public function showInformantesUnidad(Request $request)
    {
        $unidad = DependenciaInformante::find($request->get('unidad_id'));
        //return response()->json([$unidad]);
        return view('directorio.infoPersonas')->with([
            'unidad' => $unidad
        ]);
    }

    public function editInfoPersona(string $id)
    {
        $persona = PersonaUnidad::find($id);

        return response()->json($persona);
    }


    public function updateInfoPersona(Request $request)
    {
        //dd($request);
        $personaInformante = PersonaUnidad::find($request->get('idPersona'))->update([
            "nombrePersona" => $request->get('nombrePersona'),
            "profesionPersona" => $request->get('profesionPersona'),
            "areaPersona"  => $request->get('areaPersona'),
            "cargoPersona" => $request->get('cargoPersona'),
            "telefonoPersona"  => $request->get('telefonoPersona'),
            "correoPersona"    => $request->get('cargoPersona'),
        ]);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Los datos del titular informante se actualizarón correctamente');

        return redirect()->back();
    }
}
