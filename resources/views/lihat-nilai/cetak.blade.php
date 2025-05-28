<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Nilai</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        h3 { text-align: center; }
        .container { margin: 0 auto; padding: 20px; }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <h3>Data Nilai Siswa Kelas {{ $kelas }}</h3>
        <table>
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Mata Pelajaran</th>
                    <th>Semester</th>
                    <th>Tahun Ajaran</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nilais as $nilai)
                <tr>
                    <td>{{ $nilai->siswa->nama }}</td>
                    <td>{{ $nilai->kelas }}</td>
                    <td>{{ $nilai->mapel }}</td>
                    <td>{{ $nilai->semester }}</td>
                    <td>{{ $nilai->tahun_ajaran }}</td>
                    <td>{{ $nilai->nilai }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
