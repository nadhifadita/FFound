<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.dashboard_logout');
});
Route::get('/dashboard_login', function () {
    return view('dashboard.dashboard_login');
})->name('dashboard_login');
Route::get('/dashboard_logout', function () {
    return view('dashboard.dashboard_logout');
})->name('dashboard_logout');
Route::get('/dashboard_login_petugas', function () {
    return view('dashboard.dashboard_login_petugas');
})->name('dashboard_login_petugas');

Route::get('/found_item_details', function () {
    return view('Details.found_item_details');
});
Route::get('/lost_item_details_petugas', function () {
    return view('Details.lost_item_details_petugas');
});


#petugas
Route::get('/profile_petugas', function () {
    return view('profile.profile_petugas');
})->name('profile_petugas');
Route::get('/edit-profile_petugas', function () {
    return view('profile.edit-profile_petugas');
})->name('edit-profile_petugas');
Route::get('/reports_found', function () {
    return view('reports.reports_found');
});
Route::get('/reports_lost', function () {
    return view('reports.reports_lost');
});
Route::get('/list_lost_petugas', function () {
    return view('lists.list_lost_petugas');
});
Route::get('/list_found_petugas', function () {
    return view('lists.list_found_petugas');
});
Route::get('/list_pencocokan', function() {
    return view('lists.list_pencocokan');
});
Route::get('/list_history_petugas', function() {
    return view('lists.list_history_petugas');
});
Route::get('/found_item_details', function() {
    return view('Details.found_item_details');
});
Route::get('/lost_item_details_petugas', function() {
    return view('Details.lost_item_details_petugas');
});
Route::get('/history_items_details_petugas', function() {
    return view('Details.history_items_details_petugas');
});
Route::get('/history_item_details_petugas', function () {
    return view('Details.history_item_details_petugas');
});

#Mahasiswa
Route::get('/reports_mahasiswa', function () {
    return view('reports.reports_mahasiswa');
});

// Rute Login Anda (untuk menampilkan form) - Dibenahi ke 'auth.login'
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Rute POST untuk menangani submit form login, arahkan ke controller Breeze
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Rute Register Anda (untuk menampilkan form) - Dibenahi ke 'auth.register'
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Rute POST untuk menangani submit form register, arahkan ke controller Breeze
Route::post('/register', [RegisteredUserController::class, 'store']);

// Rute Logout, arahkan ke controller Breeze
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


// Rute Forgot Password - Dibenahi ke 'auth.forgotPassword'
Route::get('/forgot_password', function () {
    return view('auth.forgotPassword');
});
Route::get('/profile', function () {
    return view('profile.profile');
})->name('profile');
Route::get('/edit-profile', function () {
    return view('profile.edit-profile');
})->name('edit-profile');

Route::get('/list_lost', function () {
    return view('lists.list_lost');
});
Route::get('/list_found', function() {
    return view('lists.list_found');
});
Route::get('/list_history', function() {
    return view('lists.list_history');
});
Route::get('/lost_item_details', function () {
    return view('Details.lost_item_details');
});
Route::get('/history_items_details', function() {
    return view('Details.history_items_details');
});
Route::get('/history_item_details', function () {
    return view('Details.history_item_details');
});

#route kosongan (biar nggak error aja)
Route::get('/report-lost', function () {
    return view('/');
})->name('report-lost');
Route::get('/lost-item-destroy', function () {
    return view('/');
})->name('lost-item.destroy');
Route::get('/profile-update', function () {
    return view('/');
})->name('profile.update');


# breeze (Bagian ini perlu disesuaikan jika Anda masih ingin menggunakan profile management Breeze)
// Rute dashboard Breeze (jika Anda ingin menggunakannya sebagai fallback atau untuk tujuan lain)
Route::get('/dashboard', function () {
    // Anda bisa menambahkan logika pengalihan di sini juga berdasarkan peran
    if (auth()->check()) { // Pastikan user sudah login
        if (auth()->user()->role === 'mahasiswa') {
            return redirect()->route('dashboard_login');
        } elseif (auth()->user()->role === 'petugas') {
            return redirect()->route('dashboard_login_petugas');
        }
    }
    // Jika tidak ada peran yang cocok atau tidak login, arahkan ke view default Breeze atau ke halaman utama
    return view('dashboard'); // Ini view dashboard bawaan Breeze
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    // Rute profile Breeze (jika Anda masih ingin menggunakannya)
    // Pastikan nama rute ini unik dan tidak bertabrakan dengan rute profile Anda yang lain
    Route::get('/profile/breeze', [ProfileController::class, 'edit'])->name('profile.edit.breeze');
    Route::patch('/profile/breeze', [ProfileController::class, 'update'])->name('profile.update.breeze');
    Route::delete('/profile/breeze', [ProfileController::class, 'destroy'])->name('profile.destroy.breeze');
});


Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('password.request');

// Mengirim link reset password ke email
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('password.email');

// Form untuk mengatur password baru setelah menerima link reset
Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            ->name('password.reset');

// Menyimpan password baru
Route::post('reset-password', [NewPasswordController::class, 'store'])
            ->name('password.update');

// require __DIR__.'/auth.php'; // <-- Pastikan ini tetap di komentar atau dihapus