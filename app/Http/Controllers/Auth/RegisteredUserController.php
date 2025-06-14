<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\AdminProfile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'nim_nip' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

         $isAdmin = false; // Defaultnya adalah user biasa

        if (str_ends_with($request->email, '@ub.ac.id')) {
            $isAdmin = true;
        } elseif (str_ends_with($request->email, '@student.ub.ac.id')) {
            $isAdmin = false; // Ini memastikan secara eksplisit jika ada prioritas
        }

        $user = User::create([
            'name' => $request->name,
            'nim_nip' => $request->nim_nip,
            'phone' => $request->phone,
            'is_admin' => $isAdmin,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($isAdmin){
            AdminProfile::create([
                'user_id' => $user->id, // Dapatkan ID dari objek $user yang baru dibuat
                // Kolom 'created_at' dan 'updated_at' akan diisi secara otomatis oleh Eloquent
                // Anda bisa menambahkan kolom lain di sini jika ada di tabel admin_profiles
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
