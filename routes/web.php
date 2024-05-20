<?php

use Illuminate\Support\Facades\Route;
use Laravel\Prompts\Prompt;
use Psy\VersionUpdater\GitHubChecker;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('front.home');
});

// contoh routing untuk mengarahkan ke view tanpa melalui controller
Route::get('/halo', function() {
    return view('hello');
});

// contoh routing yang mengarahkan ke dirinya sendiri, tanpa view atau controller
Route::get('/salam', function() {
    return "Selamat Pagi Peserta MSIB";
});

// contoh routing yang menggunakan parameter
Route::get('/staff/{nama}/{divisi}', function($nama, $divisi) {
    return 'Nama Pegawai : ' .$nama. '<br> Departemen : ' .$divisi;
});

Route::get('/daftar_nilai', function() {
    //return view yang mengarahkan ke file daftar_nilai di dalam folder nilai
    return view('nilai.daftar_nilai');
});

Route::get('/dashboard', function() {
    return view('admin.dashboard');
});