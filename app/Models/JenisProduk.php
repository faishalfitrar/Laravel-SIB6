<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProduk extends Model
{
    use HasFactory;
    // panggil nama tabel yang akan digunakan
    protected $table = 'jenis_produk';

    // panggil kolom yang ada di tabel (sesuai yang ada didalam tabel)
    protected $fillable = ['nama'];

    // penanda atau pemanggilan class produk untuk relasi one to many
    public function produk(){
        return $this->hasMany(Produk::class);
    }
}
