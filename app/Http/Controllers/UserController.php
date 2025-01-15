<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    
    public function index() {
        $users = User::all();
        //return response()->json($users);
        return view('users/index')
            ->with(['users' => $users]);
    }

    public function create() {
        $roles = Role::all();
        return view('users/create')->with([
            'roles' => $roles
        ]);
    }

    public function store(UserFormRequest $request) {
        dd($request);

        $user = User::create([
            'name'              => $request->get('name'),
            'primerApellido'    => $request->get('primerApellido'),
            'segundoApellido'   => $request->get('segundoApellido'),
            'username'          => $request->get('username'),
            'password'          => Hash::make($request->get('password')),
            'activo'            => TRUE,
        ]);

        $user->assignRole();

        return redirect()->route('usuarios.index');
    }

    public function edit(string $id){
        $user = User::find($id);
        return view('users/edit')->with(['user' => $user]);
    }

    public function update(UserFormRequest $request, string $id) {
        //dd($request);

        $user = User::find($id)->update([
            'name'              => $request->get('name'),
            'primerApellido'    => $request->get('primerApellido'),
            'segundoApellido'   => $request->get('segundoApellido'),
            'username'          => $request->get('username'),
            'activo'            => TRUE,
        ]);

        return redirect()->route('usuarios.index');
    }

    public function destroy(Request $request) {
        //dd($request);
        $user = User::find($request->get('userId'));
        $user->delete();
        //$user->delete();

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('El usuario se ha eliminado correctamente');
        return redirect()->route('usuarios.index');
    }
}
