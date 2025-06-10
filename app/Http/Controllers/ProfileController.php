<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\LostItem;
use App\Models\FoundItem; 

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $lostItems = LostItem::where('user_id', $user->id)
                            ->orderBy('created_at', 'desc')
                            ->get();

        $foundItems = FoundItem::where('user_id', $user->id)
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('profile.profile', compact('user', 'lostItems', 'foundItems'));
    }

    /**
     * Menampilkan form edit profil pengguna.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        // Pilih view edit profil berdasarkan role pengguna
        if ($user->role === 'petugas') {
            return view('profile.edit-profile_petugas', ['user' => $user]);
        } else {
            return view('profile.edit-profile', ['user' => $user]); // View Breeze default untuk edit profil umum/mahasiswa
        }
    }

    /**
     * Memperbarui informasi profil pengguna.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // ... (kode update profil dari sebelumnya) ...
        $user = $request->user();
        $user->fill($request->validated());
        if ($user->isDirty('email')) { $user->email_verified_at = null; }
        if ($request->has('nim_nip')) { $user->nim_nip = $request->nim_nip; }
        if ($request->has('phone')) { $user->phone = $request->phone; }
        $user->save();

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->nim_nip = $request->input('nip');
        $user->phone = $request->input('phone');

        $request->user()->save();

        return Redirect::route('profile')->with('status', 'profile-updated');
    }


    /**
     * Menghapus akun pengguna.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // ... (Logika hapus akun Breeze default) ...
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}