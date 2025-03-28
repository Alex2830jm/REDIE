<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }

    public function change_password($user) {        
        $user = User::where('username', '=', $user)->first();

        return view('auth/change-password')->with(['user' => $user]);
        
    }

    public function update_password(string $id, Request $request) {
        $user = User::find($id)->update([
            'password' => Hash::make($request->get('password'))
        ]);

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Tu contraseña se ha actualizado correctamente');

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
