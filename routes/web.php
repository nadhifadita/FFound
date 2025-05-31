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

#Satpam
Route::get('/reports_found', function () {
    return view('reports.reports_found');
});
Route::get('/reports_lost', function () {
    return view('reports.reports_lost');
});
Route::get('/list_lost', function () {
    return view('lists.list_lost');
});
Route::get('/list_found', function() {
    return view('lists.list_found');
});
Route::get('/list_pencocokan', function() {
    return view('lists.list_pencocokan');
});
Route::get('/list_history', function() {
    return view('lists.list_history');
});

#Mahasiswa
Route::get('/reports_mahasiswa', function () {
    return view('reports.reports_mahasiswa');
});