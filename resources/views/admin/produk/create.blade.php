 @extends('admin.layouts.app')
 @section('konten')
     <h1 align="center">Input Produk</h1>

     {{-- ini untuk peringatan error saat input --}}
     @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
         </div>
     @endif
     {{-- batas peringatan error saat input --}}
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data"> @csrf
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Kode Produk</label> 
        <div class="col-8">
        <input id="text" name="kode" type="text" class="form-control @error('kode') is-invalid @enderror">
        {{-- ini peringatan error saat input dibawah kolom --}}
        @error('kode')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- batas peringatan error saat input dibawah kolom --}}
        </div>
    </div>
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Nama Produk</label> 
        <div class="col-8">
        <input id="text1" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror">
        {{-- ini peringatan error saat input dibawah kolom --}}
        @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- batas peringatan error saat input dibawah kolom --}}
        </div>
    </div>
    <div class="form-group row">
        <label for="text2" class="col-4 col-form-label">Harga Beli Produk</label> 
        <div class="col-8">
        <input id="text2" name="harga_beli" type="text" class="form-control @error('harga_beli') is-invalid @enderror"> 
        {{-- ini peringatan error saat input dibawah kolom --}}
        @error('harga_beli')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- batas peringatan error saat input dibawah kolom --}}
        </div>
    </div>
    <div class="form-group row">
        <label for="text3" class="col-4 col-form-label">Harga Jual Produk</label> 
        <div class="col-8">
        <input id="text3" name="harga_jual" type="text" class="form-control @error('harga_jual') is-invalid @enderror">
        {{-- ini peringatan error saat input dibawah kolom --}}
        @error('harga_jual')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- batas peringatan error saat input dibawah kolom --}}
        </div>
    </div>
    <div class="form-group row">
        <label for="text4" class="col-4 col-form-label">Stok Produk</label> 
        <div class="col-8">
        <input id="text4" name="stok" type="text" class="form-control @error('stok') is-invalid @enderror">
        {{-- ini peringatan error saat input dibawah kolom --}}
        @error('stok')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- batas peringatan error saat input dibawah kolom --}}
        </div>
    </div>
    <div class="form-group row">
        <label for="text5" class="col-4 col-form-label">Minimal Stok Produk</label> 
        <div class="col-8">
        <input id="text5" name="min_stok" type="text" class="form-control @error('min_stok') is-invalid @enderror">
        {{-- ini peringatan error saat input dibawah kolom --}}
        @error('min_stok')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- batas peringatan error saat input dibawah kolom --}}
        </div>
    </div>
    <div class="form-group row">
        <label for="textarea" class="col-4 col-form-label">Deskripsi Produk</label> 
        <div class="col-8">
        <textarea name="deskripsi" id="textarea" cols="40" rows="5" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="text5" class="col-4 col-form-label">Foto Produk</label> 
        <div class="col-8">
        <input id="text5" name="foto" type="file" class="form-control @error('foto') is-invalid @enderror">
        {{-- ini peringatan error saat input dibawah kolom --}}
        @error('foto')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- batas peringatan error saat input dibawah kolom --}}
        </div>
    </div>
    <div class="form-group row">
        <label for="select" class="col-4 col-form-label">Jenis Produk</label> 
        <div class="col-8">
        <select id="select" name="jenis_produk_id" class="custom-select">
            @foreach ($jenis_produk as $j)
                <option value="{{ $j->id }}">{{ $j->nama }}</option>
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
 @endsection