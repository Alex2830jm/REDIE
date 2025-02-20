<?php

namespace App\Http\Controllers;

use App\Models\DependenciaInformante;
use App\Models\PersonaUnidad;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{


    public function listDependencias(Request $request)
    {
        $dependencias = DependenciaInformante::where('tipoDI', '=', $request->get('type'))->where('nivelDI', '1')->get();
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
            "profesion" => $request->get('profesionPersona'),
            "area"  => $request->get('areaPersona'),
            "cargo" => $request->get('cargoPersona'),
            "telefono"  => $request->get('telefonoPersona'),
            "correo"    => $request->get('correoPersona'),
        ]);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Los datos del titular informante se actualizarón correctamente');

        return redirect()->back();
    }
}
