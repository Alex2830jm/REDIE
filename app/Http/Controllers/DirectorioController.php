<?php

namespace App\Http\Controllers;

use App\Models\AreasUnidad;
use App\Models\Dependencia;
use App\Models\PersonaUnidad;
use App\Models\UnidadInformativa;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class DirectorioController extends Controller
{


    public function listDependencias(Request $request) {
        $dependencias = Dependencia::where('tipo_dependencia', '=', $request->get('type'))->get();
        return view('directorio/dependencias')->with([
            'dependencias' => $dependencias
        ]);
    }

    public function listUnidades(string $id) {
        $dependencia = Dependencia::find($id);
        return view('directorio/unidades')->with([
            'dependencia' => $dependencia,
        ]);
    }

    public function infoPersonas(Request $request) {
        $tipo = $request->get('tipo');
        $id = $request->get('id');
        
        if ($tipo == 'dependencia') {
            $personas = PersonaUnidad::where('dependencia_id', $id)->get();
        } else if ($tipo === 'unidad') {
            $personas = PersonaUnidad::where('unidad_id', $id)->get();
        }
        return view('directorio/infoPersonas')->with([
            'personas' => $personas
        ]);
    }

    public function create() {
        return view('directorio/create');
    }

    public function store(Request $request) {
        //dd($request);
        $dependencia = Dependencia::create([
            'tipo' => $request->get('tipo_dependencia'),
            'nombreDependencia' => $request->get('nombreDependencia'),
            'domicilioDependencia' => $request->get('domicilioDependencia'),
        ]);

        $unidades = $request->get('indexUnidad');
        $indexUnidad = $request->get('indexUnidad');
        $indexPersona = $request->get('index');

        if(!empty($unidades) > 0) {
            foreach($indexUnidad as $i => $iu) {
                UnidadInformativa::create([
                    'dependencia_id' => $dependencia->id,
                    'nombreUnidad' => $request->get('unidadInformativa')[$i],
                    'direccion' => $request->get('domicilioUnidad')[$i],
                ]);
            }
        }

        foreach($indexPersona as $j => $ip) {
            $tipoInformacion = $request->get('tipoPersona')[$j] === 'dependencia' 
                ? ['dependencia_id' => $dependencia->id] 
                : ['unidad_id' => $dependencia->unidades->pluck('id')[$indexPersona[$j]]];
            
            PersonaUnidad::create($tipoInformacion + [
                "nombrePersona" => $request->get('nombrePersona')[$j],
                "profesion" => $request->get('profesionPersona')[$j],
                "area" => $request->get('areaInformantePersona')[$j],
                "cargo" => $request->get('cargoAreaPersona')[$j],
                "telefono" => $request->get('telefonoContactoPersona')[$j],
                "correo" => $request->get('correoContactoPersona')[$j],
            ]);
        }

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Dependencia agregada al directorio correctamente');

        return redirect()->route('directorio.index');
    }
}
