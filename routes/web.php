<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\FoundItemController; 
use App\Http\Controllers\HistoryController; 

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'dashboard.dashboard_logout');
Route::view('/dashboard_login', 'dashboard.dashboard_login')->name('dashboard_login');
Route::view('/dashboard_logout', 'dashboard.dashboard_logout')->name('dashboard_logout');
Route::view('/dashboard_login_petugas', 'dashboard.dashboard_login_petugas')->name('dashboard_login_petugas');

/*
|--------------------------------------------------------------------------
| Details Routes
|--------------------------------------------------------------------------
*/

// ----- page history
Route::get('/list_history_petugas', [HistoryController::class, 'index'])->name('history.index');

Route::view('/found_item_details', 'Details.found_item_details')->name('found_item_details');
Route::view('/lost_item_details_petugas', 'Details.lost_item_details_petugas');
Route::view('/lost_item_details', 'Details.lost_item_details');
Route::view('/history_items_details_petugas', 'Details.history_items_details_petugas');
Route::view('/history_item_details_petugas', 'Details.history_item_details_petugas');
Route::view('/history_items_details', 'Details.history_items_details');
Route::view('/history_item_details', 'Details.history_item_details');

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::view('/profile', 'profile.profile')->name('profile');
Route::view('/edit-profile', 'profile.edit-profile')->name('edit-profile');
Route::view('/profile_petugas', 'profile.profile_petugas')->name('profile_petugas');
Route::view('/edit-profile_petugas', 'profile.edit-profile_petugas')->name('edit-profile_petugas');

/*
|--------------------------------------------------------------------------
| List Routes
|--------------------------------------------------------------------------
*/

Route::get('/list_lost', [LostItemController::class, 'index'])->name('list_lost');
Route::get('/list_lost_petugas', [LostItemController::class, 'indexPetugas'])->name('list_lost_petugas');
Route::view('/list_found', 'lists.list_found');
Route::get('/list_found_petugas', [FoundItemController::class, 'indexPetugas'])->name('list_found_petugas');
Route::get('/list_pencocokan', function() {return view('lists.list_pencocokan');})->name('list_pencocokan');
Route::view('/list_history', 'lists.list_history');
// Route::view('/list_history_petugas', 'lists.list_history_petugas');

/*
|--------------------------------------------------------------------------
| Reports Routes
|--------------------------------------------------------------------------
*/

Route::view('/reports_found', 'reports.reports_found')->name('reports_found');
Route::view('/reports_lost', 'reports.reports_lost')->name('reports_lost');
Route::view('/reports_mahasiswa', 'reports.reports_mahasiswa')->name('reports_mahasiswa');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

// Login & Register Views
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::view('/forgot_password', 'auth.forgotPassword');

// Auth Process
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Password Reset
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');

/*
|--------------------------------------------------------------------------
| Lost Item Detail
|--------------------------------------------------------------------------
*/

Route::get('/lost-items/{lostItem}', [LostItemController::class, 'show'])->name('lost_item_details');
Route::get('/found-items/{foundItem}', [App\Http\Controllers\FoundItemController::class, 'show'])->name('found_item_details');

/*
|--------------------------------------------------------------------------
| Empty Placeholder Routes
|--------------------------------------------------------------------------
*/

Route::view('/report-lost', '/')->name('report-lost');
Route::view('/lost-item-destroy', '/')->name('lost-item.destroy');
Route::view('/profile-update', '/')->name('profile.update');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Dashboard redirect by role
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'mahasiswa') {
            return redirect()->route('dashboard_login');
        } elseif (auth()->user()->role === 'petugas') {
            return redirect()->route('dashboard_login_petugas');
        }
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    // Breeze profile routes
    Route::get('/profile/breeze', [ProfileController::class, 'edit'])->name('profile.edit.breeze');
    Route::patch('/profile/breeze', [ProfileController::class, 'update'])->name('profile.update.breeze');
    Route::delete('/profile/breeze', [ProfileController::class, 'destroy'])->name('profile.destroy.breeze');

    // Reports (POST)
    Route::post('/reports/lost', [ReportController::class, 'storeLostItem'])->name('report.store_lost');
    Route::post('/reports/found', [ReportController::class, 'storeFoundItem'])->name('report.store_found');
});
