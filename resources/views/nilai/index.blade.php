@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Daftar Siswa Kelas {{ $kelas }}</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('nilai.pilih-kelas') }}" class="btn btn-secondary mb-3">Kembali</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $siswa)
            <tr>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>
                    <a href="{{ route('nilai.create', [$kelas, $siswa->id]) }}" class="btn btn-sm btn-primary">Input Nilai</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
