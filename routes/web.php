<?php

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
Route::get('/dashboard_login_satpam', function () {
    return view('dashboard.dashboard_login_satpam');
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
#---