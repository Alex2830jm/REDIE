<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Flasher\Prime\FlasherInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = Role::all();
        return view('users.create')->with([
            'roles' => $roles
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, FlasherInterface  $flasher)
    {
        //dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'primerApellido' => ['required', 'string', 'max:255'],
            'segundoApellido' => ['string', 'max:255'],
            'username' => ['required', 'string', 'lowercase', 'unique:users,username'],
            //'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password' => ['required', 'string'],
        ]);

        $user = User::create([
            'name'              => $request->get('name'),
            'primerApellido'    => $request->get('primerApellido'),
            'segundoApellido'   => $request->get('segundoApellido'),
            'username'          => $request->get('username'),
            'password'          => Hash::make($request->get('password')),
            'activo'            => TRUE,
        ]);

        //event(new Registered($user));

        //Auth::login($user);

        //return redirect(RouteServiceProvider::HOME);
        $flasher
            ->options([
                'position' => 'top-center'
            ])
            ->addSuccess('El usuaurio se ha registrado con exito', 'Registrado');
        return redirect()->route('usuarios.index');
    }
}
