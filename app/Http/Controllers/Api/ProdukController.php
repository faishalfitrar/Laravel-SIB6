<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
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

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'kode' => 'required|unique:produk|max:10',
            'nama' => 'required|max:45',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'min_stok' => 'required|numeric',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        $produk = Produk::create([
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'harga_beli'=>$request->harga_beli,
            'harga_jual'=>$request->harga_jual,
            'stok'=>$request->stok,
            'min_stok'=>$request->min_stok,
            'deskripsi'=>$request->deskripsi,
            'foto'=>$request->foto,
            'jenis_produk_id'=>$request->jenis_produk_id,
            'updated_at' => $request->updated_at,
            'created_at' => $request->created_at  
        ]);
        return new ProdukResource(true, 'Produk Ditambah', $produk);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'kode' => 'required|max:10',
            'nama' => 'required|max:45',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'min_stok' => 'required|numeric',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        $produk = Produk::whereId($id)->update([
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'harga_beli'=>$request->harga_beli,
            'harga_jual'=>$request->harga_jual,
            'stok'=>$request->stok,
            'min_stok'=>$request->min_stok,
            'deskripsi'=>$request->deskripsi,
            'foto'=>$request->foto,
            'jenis_produk_id'=>$request->jenis_produk_id,
            'updated_at' => $request->updated_at,
            'created_at' => $request->created_at  
        ]);
        return new ProdukResource(true, 'Produk Diubah', $produk);
    }

    public function destroy($id){
        $produk = Produk::whereId($id)->first();
        $produk->delete();
        return new ProdukResource(true, 'Produk Dihapus', $produk);
    }
}
