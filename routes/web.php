<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\FoundItemController;
use App\Http\Controllers\PencocokanController;
use App\Http\Controllers\HistoryItemController;

/*
|--------------------------------------------------------------------------
| Rute Publik (Dapat Diakses Semua Orang)
|--------------------------------------------------------------------------
*/
Route::view('/', 'dashboard.dashboard_logout')->name('dashboard_logout');

// Detail Item yang bisa dilihat publik
Route::get('/lost-items/{lostItem}', [LostItemController::class, 'show'])->name('lost_item_details');
Route::get('/found-items/{foundItem}', [FoundItemController::class, 'show'])->name('found_item_details');

// List Item yang bisa dilihat publik
Route::view('/list_found', 'lists.list_found');


/*
|--------------------------------------------------------------------------
| Rute Tamu (Guest - Hanya untuk yang Belum Login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Tampilan Halaman
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
    Route::view('/forgot_password', 'auth.forgotPassword');

    // Proses Autentikasi
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    // Proses Reset Password
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
});


/*
|--------------------------------------------------------------------------
| Rute Terotentikasi (Umum - Untuk Semua Peran yang Login)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/profile', function () {
        return view('profile.profile');
    })->name('profile');

    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/edit-profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/reports/lost', [ReportController::class, 'storeLostItem'])->name('report.store_lost');
    Route::post('/reports/found', [ReportController::class, 'storeFoundItem'])->name('report.store_found');

});
Route::middleware(['auth', 'admin'])->group(function () {
    // Rute untuk fungsionalitas khusus admin
    Route::get('reports_found', function () {
        return view('reports.reports_found');
    })->name('reports_found');
    
});


/*
|--------------------------------------------------------------------------
| Rute Khusus Peran: Mahasiswa
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    // Dashboard & Laporan
    Route::view('/dashboard_login', 'dashboard.dashboard_login')->name('dashboard_login');
    Route::view('/reports_found', 'reports.reports_found')->name('reports_found');
    Route::view('/reports_lost', 'reports.reports_lost')->name('reports_lost');
    Route::view('/reports_mahasiswa', 'reports.reports_mahasiswa')->name('reports_mahasiswa');

    // List & Detail Item
    Route::get('/list_lost', [LostItemController::class, 'index'])->name('list_lost');
    Route::get('/list_history', [HistoryItemController::class, 'index'])->name('list_history');
    Route::get('/history-items/{historyItem}', [HistoryItemController::class, 'show'])->name('history_item_details');
    
    // Profil Mahasiswa
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::view('/edit-profile', 'profile.edit-profile')->name('edit-profile');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // View statis (jika diperlukan)
    Route::view('/found_item_details', 'Details.found_item_details')->name('found_item_details_view');
    Route::view('/lost_item_details', 'Details.lost_item_details');
    Route::view('/history_items_details', 'Details.history_items_details');
    Route::view('/history_item_details', 'Details.history_item_details');
});


/*
|--------------------------------------------------------------------------
| Rute Khusus Peran: Petugas
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:petugas'])->group(function () {
    // Dashboard
    Route::view('/dashboard_login_petugas', 'dashboard.dashboard_login_petugas')->name('dashboard_login_petugas');

    // List & Detail Item
    Route::get('/list_lost_petugas', [LostItemController::class, 'indexPetugas'])->name('list_lost_petugas');
    Route::get('/list_found_petugas', [FoundItemController::class, 'indexPetugas'])->name('list_found_petugas');
    Route::get('/list_history_petugas', [HistoryItemController::class, 'indexPetugas'])->name('list_history_petugas');

    // Pencocokan
    Route::get('/list_pencocokan', fn() => view('lists.list_pencocokan'))->name('list_pencocokan_view');
    Route::get('/list_pencocokan/{foundItem}', [PencocokanController::class, 'compare'])->name('list_pencocokan');
    Route::post('/pencocokan/mark-matched', [PencocokanController::class, 'markMatched'])->name('pencocokan.mark_matched');

    // Profil Petugas
    Route::view('/profile_petugas', 'profile.profile_petugas')->name('profile_petugas');
    Route::get('/edit-profile_petugas', [ProfileController::class, 'edit'])->name('edit-profile_petugas');

    // View statis (jika diperlukan)
    Route::view('/lost_item_details_petugas', 'Details.lost_item_details_petugas');
    Route::view('/history_items_details_petugas', 'Details.history_items_details_petugas');
    Route::view('/history_item_details_petugas', 'Details.history_item_details_petugas');
});


/*
|--------------------------------------------------------------------------
| Rute Placeholder (Kosong) - Perlu ditinjau
|--------------------------------------------------------------------------
*/
Route::view('/report-lost', '/')->name('report-lost');
Route::view('/lost-item-destroy', '/')->name('lost-item.destroy');
Route::view('/profile-update', '/')->name('profile.update.placeholder');