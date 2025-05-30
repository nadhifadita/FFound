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
Route::get('/dashboard_login_petugas', function () {
    return view('dashboard.dashboard_login_petugas');
});

Route::get('/item_details', function () {
    return view('Details.item_details');
});

#petugas
Route::get('/reports_found', function () {
    return view('reports.reports_found');
});
Route::get('/reports_lost', function () {
    return view('reports.reports_lost');
});

#Mahasiswa
Route::get('/reports_mahasiswa', function () {
    return view('reports.reports_mahasiswa');
});



