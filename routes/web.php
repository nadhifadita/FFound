<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.dashboard_logout');
});
Route::get('/dashboard_login', function () {
    return view('dashboard.dashboard_login');
});
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