<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\JenisProduk;
use App\Models\Kartu;

class DashboardController extends Controller
{
    //
    public function index(){
        $kartu = Kartu::count();
        $jenis_produk = JenisProduk::count();
        $pelanggan = Pelanggan::count();
        $produk = Produk::count();
        $produkData = Produk::select('kode', 'harga_jual')->get();
        // $produkData => json()['data'] (pengubahan data ke json)
        $jenis_kelamin = DB::table('pelanggan')
        ->selectRaw('jk, count(jk) as jumlah')
        ->groupBy('jk')
        ->get();
        return view('admin.dashboard', compact('produk', 'pelanggan','jenis_produk', 'kartu', 'produkData', 'jenis_kelamin'));
    }
}
