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
| Rute Umum (Tidak Membutuhkan Autentikasi)
|--------------------------------------------------------------------------
| Rute yang dapat diakses oleh siapa saja, baik yang sudah login maupun belum.
*/

// Halaman utama / landing page
Route::get('/', function () {
    return view('dashboard.dashboard_logout');
})->name('dashboard_logout'); // Memberi nama rute untuk konsistensi

// List Item yang bisa dilihat publik (mengambil data dari Controller)
Route::get('/list_lost', [LostItemController::class, 'index'])->name('list_lost');
Route::get('/list_found', [FoundItemController::class, 'index'])->name('list_found');

// Detail Item yang bisa dilihat publik (mengambil data dari Controller dengan Route Model Binding)
// Controller akan memutuskan view mana yang akan ditampilkan (umum/petugas)
Route::get('/lost-items/{lostItem}', [LostItemController::class, 'show'])->name('lost_item_details');
Route::get('/found-items/{foundItem}', [FoundItemController::class, 'show'])->name('found_item_details');
Route::get('/history-items/{historyItem}', [HistoryItemController::class, 'show'])->name('history_item_details');

/*
|--------------------------------------------------------------------------
| Rute Tamu (Guest - Hanya untuk yang Belum Login)
|--------------------------------------------------------------------------
| Rute untuk proses autentikasi (login, register, reset password).
*/
Route::middleware('guest')->group(function () {
    // Tampilan Halaman Autentikasi
    Route::get('/login', function () { return view('auth.login'); })->name('login');
    Route::get('/register', function () { return view('auth.register'); })->name('register');
    Route::get('/forgot_password', function () { return view('auth.forgotPassword'); }); // Belum diberi nama

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
| Rute yang dapat diakses oleh semua pengguna yang sudah login,
| tanpa memandang peran (role) spesifik.
*/
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Dashboard utama yang akan mengarahkan berdasarkan peran
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'mahasiswa') {
            return redirect()->route('dashboard_login');
        } elseif (auth()->user()->role === 'petugas') {
            return redirect()->route('dashboard_login_petugas');
        }
        return view('dashboard.dashboard_login'); // Fallback jika role tidak dikenali
    })->name('dashboard'); // Hapus middleware verified di sini karena sudah di ProfileController

    // Rute update profil Breeze (action form update-profile-information-form mengarah ke sini)
    // Ini menangani update untuk mahasiswa dan petugas, karena ProfileController@update sudah ada logikanya
    Route::patch('/profile/edit-profile', [ProfileController::class, 'update'])->name('profile.edit-profile.breeze');

    // Rute update password dari Breeze (action form update-password-form mengarah ke sini)
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');

    // Rute delete user dari Breeze (action form delete-user-form mengarah ke sini)
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Beri URI lebih spesifik

    // Proses laporan (memerlukan login untuk melapor)
    Route::post('/reports/lost', [ReportController::class, 'storeLostItem'])->name('report.store_lost');
    Route::post('/reports/found', [ReportController::class, 'storeFoundItem'])->name('report.store_found');
});


/*
|--------------------------------------------------------------------------
| Rute Khusus Peran: Mahasiswa (auth, role:mahasiswa)
|--------------------------------------------------------------------------
| Rute yang hanya dapat diakses oleh pengguna dengan peran 'mahasiswa'.
*/
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    // Dashboard & Laporan
    Route::get('/dashboard_login', function () { return view('dashboard.dashboard_login'); })->name('dashboard_login');
    Route::get('/reports_mahasiswa', function () { return view('reports.reports_mahasiswa'); })->name('reports_mahasiswa');

    // List & Detail Item (Listnya saja, detailnya di rute umum agar bisa diakses jika link dishare)
    // Route::get('/list_lost', [LostItemController::class, 'index'])->name('list_lost'); // Sudah di rute umum
    Route::get('/list_history', [HistoryItemController::class, 'index'])->name('list_history');
    // Route::get('/history-items/{historyItem}', [HistoryItemController::class, 'show'])->name('history_item_details'); // Sudah di rute umum

    // Profil Mahasiswa
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('edit-profile'); // Tambahan

    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Sudah di rute terotentikasi umum
});


/*
|--------------------------------------------------------------------------
| Rute Khusus Peran: Petugas (auth, role:petugas)
|--------------------------------------------------------------------------
| Rute yang hanya dapat diakses oleh pengguna dengan peran 'petugas'.
*/
Route::middleware(['auth', 'role:petugas'])->group(function () {
    // Dashboard & Laporan
    Route::get('/dashboard_login_petugas', function () { return view('dashboard.dashboard_login_petugas'); })->name('dashboard_login_petugas');
    Route::get('/reports_found', function () { return view('reports.reports_found'); })->name('reports_found');
    Route::get('/reports_lost', function () { return view('reports.reports_lost'); })->name('reports_lost');

    // List & Detail Item
    Route::get('/list_lost_petugas', [LostItemController::class, 'indexPetugas'])->name('list_lost_petugas');
    Route::get('/list_found_petugas', [FoundItemController::class, 'indexPetugas'])->name('list_found_petugas');
    Route::get('/list_history_petugas', [HistoryItemController::class, 'indexPetugas'])->name('list_history_petugas');

    // Pencocokan
    Route::get('/list_pencocokan/{foundItem}', [PencocokanController::class, 'compare'])->name('list_pencocokan');
    Route::post('/pencocokan/mark-matched', [PencocokanController::class, 'markMatched'])->name('pencocokan.mark_matched');

    // Profil Petugas
    Route::get('/profile_petugas', function () { return view('profile.profile_petugas'); })->name('profile_petugas'); // Tampilan profil petugas
    Route::get('/edit-profile_petugas', [ProfileController::class, 'edit'])->name('edit-profile_petugas'); // Form edit profil petugas
});


/*
|--------------------------------------------------------------------------
| Rute Placeholder (Akan Dihapus/Diganti)
|--------------------------------------------------------------------------
| Rute-rute ini adalah placeholder atau sudah tidak relevan.
| Disarankan untuk dihapus atau diganti dengan rute yang sesuai.
*/
// Contoh: Ini mungkin rute lama yang tidak lagi digunakan setelah refactor
// Route::view('/found_item_details', 'Details.found_item_details')->name('found_item_details_view'); // Sudah di rute umum
// Route::view('/lost_item_details', 'Details.lost_item_details'); // Sudah di rute umum
// Route::view('/history_items_details', 'Details.history_items_details'); // Sudah di rute umum
// Route::view('/history_item_details', 'Details.history_item_details'); // Sudah di rute umum
// Route::view('/lost_item_details_petugas', 'Details.lost_item_details_petugas'); // Sudah di rute umum
// Route::view('/profile-update', '/')->name('profile.update.placeholder'); // Tidak relevan, profile.update.breeze digunakan
// Route::view('/report-lost', '/')->name('report-lost'); // Gunakan reports_mahasiswa / reports_lost
// Route::view('/lost-item-destroy', '/')->name('lost-item.destroy'); // Jika ini untuk destroy item, buat rute DELETE dengan controller

// Hapus duplikasi rute update profil (sudah digabung ke profile.update.breeze di atas)
// Route::patch('/profile/breeze', [ProfileController::class, 'update'])->name('profile.update.breeze'); // Dihapus karena sudah ada
// Route::delete('/profile/breeze', [ProfileController::class, 'destroy'])->name('profile.destroy.breeze'); // Sudah ada di common auth