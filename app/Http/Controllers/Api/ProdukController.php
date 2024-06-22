<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\JenisProduk;
use DB;
use App\Http\Resources\ProdukResource;

class ProdukController extends Controller
{
    //
    public function index(){
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
        ->select('produk.*', 'jenis_produk.nama as jenis')
        ->get();
        return new ProdukResource(true, 'List Data Produk', $produk);
    }

    public function show($id){
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
        ->select('produk.*', 'jenis_produk.nama as jenis')
        ->where('produk.id', $id)
        ->first();
        if($produk){
            return new ProdukResource(true, 'Detail Produk', $produk);
        } else{
            return response()->json([
                'success' => false,
                'message' => 'Produk Tidak Ditemukan',
            ], 404); // kode 404 berarti not found
        }
    }
}
