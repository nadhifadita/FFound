<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', function () {
        return view('profile.profile');
    })->name('profile');

    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/edit-profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('reports_lost', function () {
        return view('reports.reports_lost');
    })->name('reports_lost');


});
Route::middleware(['auth', 'admin'])->group(function () {
    // Rute untuk fungsionalitas khusus admin
    Route::get('reports_found', function () {
        return view('reports.reports_found');
    })->name('reports_found');
    
});

require __DIR__.'/auth.php';
