<?php

namespace App\Http\Controllers;

use App\Events\DirectorioRegisterEvent;
use App\Models\Dependencia;
use App\Models\DependenciaInformante;
use App\Models\PersonaUnidad;
use App\Models\UnidadInformativa;
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
        $informantes = PersonaUnidad::where('di_id', '=', $id)
            ->orderBy('id', 'ASC')
            ->get();
        return view('directorio/unidades')->with([
            'dependencia' => $dependencia,
            'informantes' => $informantes
        ]);
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

        return redirect()->route('dependencia.home');
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

        return redirect()->route('dependencia.listUnidades', $id);
    }

    public function addUnidad(DependenciaInformante $dependencia, Request $request){
        //dd($request);
            $request->validate([
                'numDI_U' => 'required|string|max:12',
                'nombreDI_U' => 'required|string|max:255',
                'domicilioDI_U' => 'nullable|string|max:255',
                'correoDI_U' => 'nullable|email|max:100',
                'numTelefonoDI_U' => 'nullable|string|max:20'
            ]);

            $datosUnidad = $request->only([
                'numDI_U', 'nombreDI_U', 'domicilioDI_U', 'correoDI_U', 'numTelefonoDI_U'
            ]);

            $unidad = DependenciaInformante::create([
                'tipoDI' => $dependencia->tipoDI,
                'numDI' => $datosUnidad['numDI_U'],
                'nombreDI' => $datosUnidad['nombreDI_U'],
                'domicilioDI' => $datosUnidad['domicilioDI_U'],
                'correoDI' => $datosUnidad['correoDI_U'],
                'numTelefonoDI' => $datosUnidad['numTelefonoDI_U'],
                'nivelDI' => '2',
                'padreDI' => $dependencia->id
            ]);

            event(new DirectorioRegisterEvent($unidad));

            notyf()
                ->position('x', 'center')
                ->position('y', 'top')
                ->addSuccess('La unidad informativa se a agregado correctamente a la dependencia');

            return redirect()->route('dependencia.listUnidades', ['id' => $dependencia->id]);
        
    }

    public function editUnidad(Request $request)
    {
        $dependencia = DependenciaInformante::find($request->get('unidad_id'));
        return response()->json($dependencia);
    }

    public function showInformantesUnidad(Request $request)
    {
        $unidad = $request->get('unidad_id');
        $informantes = PersonaUnidad::where('di_id', '=', $unidad)
            ->orderBy('id', 'ASC')
            ->get();
            
        return view('components/card-informante')->with([
            'collection' => $informantes
        ]);
    }

    public function showInformante(PersonaUnidad $id)
    {
        $id->dependencia;
        return response()->json(['informante' => $id]);
    }

    public function editInformante(string $id)
    {
        $persona = PersonaUnidad::find($id);

        return response()->json($persona);
    }


    public function updateInformante(Request $request)
    {
        //dd($request);
        $personaInformante = PersonaUnidad::find($request->get('idPersona'))->update([
            "nombrePersona" => $request->get('nombrePersona'),
            "profesionPersona" => $request->get('profesionPersona'),
            "areaPersona"  => $request->get('areaPersona'),
            "cargoPersona" => $request->get('cargoPersona'),
            "telefonoPersona"  => $request->get('telefonoPersona'),
            "correoPersona"    => $request->get('correoPersona'),
        ]);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Los datos del titular informante se actualizarón correctamente');

        return redirect()->back();
    }
}
