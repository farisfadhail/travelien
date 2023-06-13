<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    // Menampilkan halaman login yaitu pada folder auth dan file login.blade.php
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // Menangani login dari inputan user
    public function store(LoginRequest $request): RedirectResponse
    {
        // Melakukan autentikasi berdasarkan $request
        $request->authenticate();

        $request->session()->regenerate();

        $request->session()->put('email', $request['email']);

        // Membuat cookie untuk fitur remember me
        if (isset($request['remember']) && !empty($request['remember'])) {
            setcookie('email', $request['email'], time()+3600);
            setcookie('password', $request['password'], time()+3600);
        } else {
            setcookie('email', '');
            setcookie('password', '');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    // Menghapus session autentikasi (logout)
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
