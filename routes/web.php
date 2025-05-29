<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
