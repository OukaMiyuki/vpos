<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller {
    /**
     * Display the login view.
     */
    public function create(): View {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse {
        $request->authenticate();
        $request->session()->regenerate();
        $notification = array(
            'message' => 'Anda telah sukses login!',
            'alert-type' => 'info',
        );
        if(Auth::user() && Auth::user()->type == 'super_admin'){
            return redirect()->route('admin.dashboard');
        } else if(Auth::user() && Auth::user()->type == 'marketing'){
            return redirect()->route('marketing.dashboard');
        } else { 
            Auth::guard('web')->logout();
            return redirect()->route('login')->with('status', 'You are not authorized to access this page.');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
