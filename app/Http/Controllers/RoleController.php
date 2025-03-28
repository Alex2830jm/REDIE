<?php

namespace App\Http\Controllers;

use App\Models\DependenciaInformante;
use App\Models\Grupo;
use Illuminate\Http\Request;
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
        $rol = Role::find($request->get('role_id'));

        $temas = Grupo::whereHas('rolesTema', function ($query) use ($request) {
            $query->where('id', $request->get('role_id'));
        })->get();

        foreach($temas as $tema) {
            $temasArray[$tema->id] = [
                'numTema' => $tema->numGrupo,
                'nombreTema' => $tema->nombreGrupo,
                'numSector' => $tema->padre->numGrupo,
                'nombreSector' => $tema->padre->nombreGrupo,
                'numGrupo' => $tema->padre->padre->numGrupo,
                'nomGrupo' => $tema->padre->padre->nombreGrupo,
            ];
        }
        
        return response()->json([
            'rol' => $rol,
            'temas' => $temasArray
        ]);
    }

    public function permissionsByRole(Request $request) {
        $rol = Role::find($request->get('role_id'));
        $permissions = $rol->permissions;

        foreach ($permissions as $permission) {
            $permissionsArray[$permission->id] = [
                'idPermission' => $permission->id,
                'nomPermission' => $permission->name,
                'desPermission' => $permission->description,
            ];
        }
        return response()->json([
            'rol' => $rol,
            'permissions' => $permissionsArray
        ]);
    }

    public function create() {
        $permissions = Permission::all();
        $grupos = Grupo::where('grupo_nivel', '2')->get();
        $dependencias = DependenciaInformante::where('nivelDI', '=', '1')
            ->orderBy('id', 'ASC')->get();

        return view('auth/roles/create')
            ->with([
                'permissions' => $permissions,
                'grupos' => $grupos,
                'dependencias' => $dependencias
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
        $role->dependencias()->sync($request->get('dependencias'), []);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('El rol de acceso se ha guardado correctamente');

        return redirect()->route('roles.index');
    }

    public function edit(string $id) {
        $role = Role::find($id);
        $permissions = Permission::all();
        $grupos = Grupo::where('grupo_nivel', '2')->get();
        $dependencias = DependenciaInformante::where('nivelDI', '=', '1')
            ->orderBy('id', 'ASC')->get();

        return view('auth/roles/edit')
            ->with([
                'role'          => $role,
                'permissions'   => $permissions,
                'grupos'         => $grupos,
                'dependencias' => $dependencias
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
        $role->dependencias()->sync($request->get('dependencias'), []);

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
