<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Temas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index() {
        $roles = Role::all();
        return view('auth/roles/index')
            ->with(['roles' => $roles]);
    }

    public function temasByRole(Request $request) {
        $temas = Grupo::whereHas('rolesTema', function ($query) use ($request) {
            $query->where('id', $request->get('role_id'));
        })->get();

        foreach($temas as $tema) {
            $temasArray[$tema->id] = [
                'nombre' => $tema->nombreGrupo,
                'sector' => $tema->padre->nombreGrupo,
                'grupo' => $tema->padre->padre->nombreGrupo,
            ];
        }
        
        return response()->json($temasArray);
    }

    public function create() {
        $permissions = Permission::all();
        $grupos = Grupo::where('grupo_nivel', '2')->get();
        
        return view('auth/roles/create')
            ->with([
                'permissions' => $permissions,
                'grupos' => $grupos
            ]);
    }

    public function store(Request $request) {
         //dd($request);
        
        $role = Role::create([
            'name' => $request->get('nameRole'),
            'description' => $request->get('descriptionRole'),
        ]);
        
        $role->syncPermissions($request->get('permission', []));
        $role->temas()->sync($request->get('tema_id', []));

        return redirect()->route('roles.index');
    }

    public function edit(string $id) {
        $role = Role::find($id);
        $permissions = Permission::all();
        $temas = Grupo::where('grupo_nivel', '4')->get();

        return view('auth/roles/edit')
            ->with([
                'role'          => $role,
                'permissions'   => $permissions,
                'temas'         => $temas
            ]);
    }

    public function update(Request $request, string $id) {
        Role::find($id)->update([
            'name' => $request->get('nameRole'),
            'description' => $request->get('descriptionRole'),
        ]);
        
        $role = Role::find($id);
        $role->syncPermissions($request->get('permission', []));
        $role->temas()->sync($request->get('tema_id', []));

        return redirect()->route('roles.index');
    }

    public function destroy(Request $request) {
        //dd($request);
        Role::destroy($request->get('roleId'));
        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('El rol se ha eliminado correctamente');
        return redirect()->route('roles.index');
    }
}
