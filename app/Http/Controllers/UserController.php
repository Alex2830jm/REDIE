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
        $users = User::orderBy('id', 'ASC')->get();
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
        //dd($request);

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
        $roles = Role::all();
        return view('users/edit')->with(['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, string $id) {
        //dd($request);

        $user = User::find($id)->update([
            'name'              => $request->get('name'),
            'primerApellido'    => $request->get('primerApellido'),
            'segundoApellido'   => $request->get('segundoApellido'),
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

    public function userResetPassword(Request $request) {
        
        $user = User::find($request->get('resetId'));

        $user->update([
            'password' => Hash::make($user->username.'2025')
        ]);
        
        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('La contraseña del usuario se ha restablecido correctamente');
        
        return redirect()->route('usuarios.index');
    }
}
