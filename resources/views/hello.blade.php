<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello, ini file pertama saya di dalam view laravel !!</h1>
    @php
        $nama = 'Budi';
        $nilai = 59.99;
    @endphp
    {{-- Struktur Kendali IF --}}
    @if ($nilai >= 60)
        @php
            $ket = 'Lulus';
        @endphp
    @else
        @php
            $ket = 'Tidak Lulus';
        @endphp
    @endif

    {{-- Memanggil variabel hasil dalam laravel dengan menggunakan kurung kurawal --}}
    {{ $nama }} dengan nilai {{ $nilai }} dinyatakan {{ $ket }}
</body>
</html>