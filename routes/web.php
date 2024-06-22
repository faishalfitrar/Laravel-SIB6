<?php 

use Laravel\Prompts\Prompt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Psy\VersionUpdater\GitHubChecker;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KartuController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\JenisProdukController;

Route::get('/', [BerandaController::class, 'index']);
Route::get('add-to-cart/{id}', [BerandaController::class, 'AddToCart'])->name('add.to.cart');
Route::get('/detail_cart/{id}', [BerandaController::class, 'detail']);
Route::get('/shop_cart', [BerandaController::class, 'cart']);
Route::patch('/update-cart', [BerandaController::class, 'update'])->name('update.cart');
Route::delete('/remove-from-cart', [BerandaController::class, 'remove'])->name('remove.from.cart');

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

// middleware berguna sebagai pembatas atau validasi antara visitor yang sudah 
//memiliki user akses dan belum memiliki akses
Route::group(['middleware' => ['auth', 'checkActive', 'role:admin|manager|staff']], function(){
    // prefix and grouping adalah mengelompokkan routing ke satu jenis route
    Route::prefix('admin')->group(function(){
        Route::get('/user', [UserController::class, 'index']);
        Route::post('/user/{user}/activate', [UserController::class, 'activate'])->name('admin.user.activate');
        Route::get('/profile', [UserController::class, 'showProfile']);
        // patch atau put digunakan sebagai pengubah data
        Route::patch('/profile/{id}', [UserController::class, 'update']); 
        
        // route by name adalah routing yang diberikan penamaan untuk kemudian dipanggil di link
        Route::get('/dashboard', [DashboardController::class, 'index']);

        // route memanggil controller setiap fungsi (nanti linknya menggunakan URL, ada di dalam view)
        Route::get('/jenis_produk', [JenisProdukController::class, 'index']);
        Route::post('/jenis_produk/store', [JenisProdukController::class, 'store']);

        // route dengan pemanggilan class
        Route::resource('produk', ProdukController::class);
        Route::resource('pelanggan', PelangganController::class);

        Route::get('/kartu', [KartuController::class, 'index']);
        Route::post('/kartu/store', [KartuController::class, 'store']);
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
