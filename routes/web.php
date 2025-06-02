<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.dashboard_logout');
});
Route::get('/dashboard_login', function () {
    return view('dashboard.dashboard_login');
})->name('dashboard_login');
Route::get('/dashboard_logout', function () {
    return view('dashboard.dashboard_logout');
});
Route::get('/dashboard_login_petugas', function () {
    return view('dashboard.dashboard_login_petugas');
});

Route::get('/found_item_details', function () {
    return view('Details.found_item_details');
});
Route::get('/lost_item_details_petugas', function () {
    return view('Details.lost_item_details_petugas');
});

#petugas
Route::get('/profile_petugas', function () {
    return view('profile.profile_petugas');
})->name('profile');
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

#Mahasiswa
Route::get('/reports_mahasiswa', function () {
    return view('reports.reports_mahasiswa');
});

Route::get('/login', function () {
    return view('autentikasi.login');
})->name('login');
Route::get('/register', function () {
    return view('autentikasi.register');
})->name('register');
Route::get('/forgot_password', function () {
    return view('autentikasi.forgotPassword');
});
Route::get('/profile', function () {
    return view('profile.profile');
})->name('profile');
Route::get('/edit-profile', function () {
    return view('profile.edit-profile');
})->name('edit-profile');
Route::get('/logout', function () {
    return view('dashboard.dashboard_logout');
})->name('logout');
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
