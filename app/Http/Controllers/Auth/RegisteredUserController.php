<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\User;
use App\Models\DetailUser;

class RegisteredUserController extends Controller {
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse {
        $request->validate([
            'username' => ['required', 'string', 'max:20', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'nama_lengkap' => ['required', 'string', 'max:100'],
            'no_ktp' => ['required', 'string', 'numeric', 'max:16', 'unique:'.DetailUser::class],
            'phone' => ['required', 'string', 'numeric', 'max:20', 'unique:'.User::class],
            'jenis_kelamin' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required', 'string', 'max:255'],
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'username' => $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
            'type' => 1,
            'is_active' =>0,
            'password' => Hash::make($request->password),
        ]);

        if(!is_null($user)) {
            $user->detailUserStore($user);
        }

        event(new Registered($user));
        $notification = array(
            'message' => 'Akun anda sukses dibuat!',
            'alert-type' => 'info',
        );
        // Auth::login($user);
        // return redirect(RouteServiceProvider::HOME);
        return redirect(route('login'))->with($notification);
    }
}
