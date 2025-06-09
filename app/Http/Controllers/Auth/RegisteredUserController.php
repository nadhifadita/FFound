<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tetap dibutuhkan untuk event Registered
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nim_nip' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Deteksi role berdasarkan domain email
        $email = $request->email;
        if (str_ends_with($email, '@student.ub.ac.id')) {
            $role = 'mahasiswa';
        } elseif (str_ends_with($email, '@ub.ac.id')) {
            $role = 'petugas';
        } else {
            // Optional: tolak pendaftaran email yang tidak valid
            return back()->withInput()->withErrors(['email' => 'Domain email tidak diizinkan.']);
        }

        $user = User::create([
            'name' => $request->name,
            'nim_nip' => $request->nim_nip,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role, // Set role otomatis
        ]);

        // Event Registered (misalnya untuk mengirim email verifikasi, jika diaktifkan)
        event(new Registered($user));

        // --- Perubahan Penting di Sini ---
        // HAPUS baris Auth::login($user); agar user tidak otomatis login setelah registrasi.
        // Auth::login($user); // Baris ini DIHAPUS atau DIKOMEN

        // Arahkan pengguna kembali ke halaman login
        // Anda bisa menambahkan pesan sukses jika ingin
        return redirect()->route('login')->with('status', 'Registrasi berhasil! Silakan login.');
    }
}