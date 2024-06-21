@extends('admin.layouts.app')
@section('konten')
    <h1 align="center">Input Produk</h1>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @foreach ($produk as $p)
        <form action="{{ route('produk.update', $p->id) }}" method="POST" enctype="multipart/form-data"> @csrf 
            @method('PUT')
            <div class="form-group row">
                <label for="text" class="col-4 col-form-label">Kode Produk</label> 
                <div class="col-8">
                <input id="text" name="kode" type="text" class="form-control" value="{{ $p->kode }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="text1" class="col-4 col-form-label">Nama Produk</label> 
                <div class="col-8">
                <input id="text1" name="nama" type="text" class="form-control" value="{{ $p->nama }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="text2" class="col-4 col-form-label">Harga Beli Produk</label> 
                <div class="col-8">
                <input id="text2" name="harga_beli" type="text" class="form-control" value="{{ $p->harga_beli }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="text3" class="col-4 col-form-label">Harga Jual Produk</label> 
                <div class="col-8">
                <input id="text3" name="harga_jual" type="text" class="form-control" value="{{ $p->harga_jual }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="text4" class="col-4 col-form-label">Stok Produk</label> 
                <div class="col-8">
                <input id="text4" name="stok" type="text" class="form-control" value="{{ $p->stok }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="text5" class="col-4 col-form-label">Minimal Stok Produk</label> 
                <div class="col-8">
                <input id="text5" name="min_stok" type="text" class="form-control" value="{{ $p->min_stok }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="textarea" class="col-4 col-form-label">Deskripsi Produk</label> 
                <div class="col-8">
                <textarea name="deskripsi" id="textarea" cols="40" rows="5" class="form-control">{{ $p->deskripsi }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="text5" class="col-4 col-form-label">Foto Produk</label> 
                <div class="col-8">
                <input id="text5" name="foto" type="file" class="form-control" value="{{ $p->foto }}">
                @if (!empty($p->foto))
                    <img src="{{ url('admin/image') }}/{{ $p->foto }}" alt="">
                @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="select" class="col-4 col-form-label">Jenis Produk</label> 
                <div class="col-8">
                <select id="select" name="jenis_produk_id" class="custom-select">
                    @foreach ($jenis_produk as $j)
                        @php
                            $sel = ($j->id == $p->jenis_produk_id) ? 'selected' : '';
                        @endphp
                        <option value="{{ $j->id }}" {{ $sel }}>{{ $j->nama }}</option>
                    @endforeach
                </select>
                </div>
            </div> 
            <div class="form-group row">
                <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    @endforeach
@endsection