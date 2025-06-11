<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\FoundItemController;
use App\Http\Controllers\PencocokanController;
use App\Http\Controllers\HistoryItemController;

# Route Landing Page
Route::get('/', function () {
    return view('welcome');
});

# Dashboard hanya bisa diakses jika sudah login (jika belum login dan mencoba mengakses dashboard, maka akan diarahkan ke page login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


# Route yang hanya bisa diakses jika sudah login
Route::middleware('auth')->group(function () {

    # Lihat Profile
    Route::get('/profile', function () {
        return view('profile.profile');
    })->name('profile');

    # Edit Profile
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/edit-profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    # Report
    Route::view('/reports_lost', 'reports.reports_lost')->name('reports_lost');
    Route::post('/reports/lost', [ReportController::class, 'storeLostItem'])->name('report.store_lost');

    Route::get('reports_lost', function () {
        return view('reports.reports_lost');
    })->name('reports_lost');

    # List Item untuk umum
    Route::get('/list_lost', [LostItemController::class, 'index'])->name('list_lost');
    Route::get('/list_history', [HistoryItemController::class, 'index'])->name('list_history');

    # Detail Item
    Route::get('/lost-items/{lostItem}', [LostItemController::class, 'show'])->name('lost_item_details');
    Route::get('/found-items/{foundItem}', [FoundItemController::class, 'show'])->name('found_item_details');
    Route::get('/history-items/{historyItem}', [HistoryItemController::class, 'show'])->name('history_item_details');
});

# Route yang hanya bisa diakses oleh admin
Route::middleware(['auth', 'admin'])->group(function () {
    // Rute untuk fungsionalitas khusus admin
    #List Found
    Route::get('/list_found', [FoundItemController::class, 'index'])->name('list_found');

    # Report found
    Route::view('/reports_found', 'reports.reports_found')->name('reports_found');
    Route::post('/reports/found', [ReportController::class, 'storeFoundItem'])->name('report.store_found');

    # List Pencocokan
    Route::get('/list_pencocokan', fn() => view('lists.list_pencocokan'))->name('list_pencocokan_view');
    Route::get('/list_pencocokan/{foundItem}', [PencocokanController::class, 'compare'])->name('list_pencocokan');
    Route::post('/pencocokan/mark-matched', [PencocokanController::class, 'markMatched'])->name('pencocokan.mark_matched');
    
});

require __DIR__.'/auth.php';
