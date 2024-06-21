<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\JenisProduk;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BerandaController extends Controller
{
    //
    public function index(){
        // fungsi index untuk produk
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
        ->select('produk.*', 'jenis_produk.nama as jenis')
        ->get();
        return view ('front.home', compact('produk'));
    }

    public function AddToCart($id){
        $produk = Produk::findOrFail($id);
        // session: library yang menyimpan sebuah history
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            // penambahan value secara berkala (increment)
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "nama" => $produk->nama,
                "quantity" => 1,
                "harga_jual" => $produk->harga_jual,
                "foto" => $produk->foto
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk Berhasil Ditambahkan ke Keranjang!');
    }
}
