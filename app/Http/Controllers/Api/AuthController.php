<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Validator;
use JWTAuth;


class AuthController extends Controller {

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request) {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('login', 'password');
        // $token = Auth::attempt($credentials);
        $user = User::where('email', $request->login)->orWhere('username', $request->login)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Email atau Username salah, coba cek kembali!',
            ], 401);
        }

        $usernameToken = Auth::attempt(['username' => $user->username, 'password' => $request->password]);
        $emailToken = Auth::attempt(['email' => $user->email, 'password' => $request->password]);

        if (!$usernameToken ||!$emailToken) {
            return response()->json([
                'message' => 'Email atau password salah, coba cek kembali!',
            ], 401);
        }
        if($usernameToken){
            $tokenLogin = $usernameToken;
        } 

        if($emailToken){
            $tokenLogin = $emailToken;
        }
        if($tokenLogin = Auth::guard('api')){
            $user = Auth::user();
            if($user->is_active == 0){
                return response()->json([
                    'message' => 'Akun belum diatifkan oleh admin, silahkan hubungi admin!',
                ], 401);
            } else {
                return response()->json([
                    'message' => "Anda berhasil masuk",
                    'user' => $user,
                    'authorization' => [
                        'token' => $tokenLogin,
                        'type' => 'bearer',
                    ]
                ], 201);
            }
        }


        // if (Auth::attempt(['email' => $user->email, 'password' => $request->password]) || Auth::attempt(['username' => $user->username, 'password' => $request->password])){
        //     if(Auth::guard('api')){
        //         $token = Auth::guard('api');
        //         $userLogin = Auth::user();
        //         if($userLogin->is_active == 0){
        //             return response()->json([
        //                 'message' => 'Akun belum diatifkan oleh admin, silahkan hubungi admin!',
        //             ], 401);
        //         } else {
        //             return response()->json([
        //                 'message' => "Anda berhasil masuk",
        //                 'user' => $user,
        //                 'authorization' => [
        //                     'token' => $token,
        //                     'type' => 'bearer',
        //                 ]
        //             ], 201);
        //         }
        //     }
        // } else {
        //     return response()->json([
        //         'message' => 'Email, Username atau password salah, coba cek kembali!',
        //     ], 401);
        // }
        
        // if (!$token) {
        //     return response()->json([
        //         'message' => 'Email atau password salah, coba cek kembali!',
        //     ], 401);
        // }
    }

    public function getUser(){
        $user = auth('api')->user();
        return response()->json(['user'=>$user], 201);
    }

    public function register(Request $request) {
        $request->validate([
            'type' =>'required|numeric',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:16|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'type' => $request->type,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }

    public function logout() {
        Auth::logout();
        
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh() {
        return response()->json([
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}
