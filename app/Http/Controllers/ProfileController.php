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
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

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
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
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
