<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Melakukan otentikasi pengguna
        $request->authenticate();

        // Meregenerasi session ID untuk keamanan
        $request->session()->regenerate();

        // Mendapatkan pengguna yang baru saja login
        $user = Auth::user();

        // Logika pengalihan berdasarkan peran (role) pengguna
        if ($user->role === 'mahasiswa') {
            // Arahkan ke dashboard_login untuk mahasiswa
            return redirect()->intended(route('dashboard_login'));
        } elseif ($user->role === 'petugas') {
            // Arahkan ke dashboard_login_petugas untuk petugas
            return redirect()->intended(route('dashboard_login_petugas'));
        }

        // Jika peran tidak dikenali atau tidak ada, arahkan ke rute default (misalnya halaman utama)
        // Anda bisa mengganti ini dengan route('dashboard') jika Anda masih punya dashboard Breeze default untuk kasus lain.
        return redirect()->intended('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Setelah logout, arahkan ke dashboard_logout yang sudah Anda definisikan
        return redirect()->route('dashboard_logout');
    }
}