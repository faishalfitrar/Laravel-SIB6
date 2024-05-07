<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ini adalah file kedua</h1>
    @php
        $no = 1;
        $s1 = ['nama' => 'ical', 'nilai' => 100];
        $s2 = ['nama' => 'bagas', 'nilai' => 80];
        $s3 = ['nama' => 'gio', 'nilai' => 75];
        $s4 = ['nama' => 'raymond', 'nilai' => 67];
        $s5 = ['nama' => 'durga', 'nilai' => 81];
        $judul = ['No', 'Nama', 'Nilai', 'Keterangan'];

        $siswa = [$s1, $s2, $s3, $s4, $s5];
    @endphp
    <table align="center" border="1" cellpadding="10">
        <thead>
            <tr>
                {{-- foreach adalah sebuah perulangan yang dimiliki oleh php di dalam laravel --}}
                @foreach ($judul as $j)
                    <th>{{ $j }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $s)
                @php
                    $ket = ($s['nilai'] >= 75) ? 'Lulus' : 'Gagal';
                    $warna = ($no % 2 == 1) ? 'Green' : 'Yellow';
                @endphp
                <tr bgcolor="{{ $warna }}">
                    <td>{{ $no++ }}</td>
                    <td>{{ $s['nama'] }}</td>
                    <td>{{ $s['nilai'] }}</td>
                    <td>{{ $ket }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>