@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="{{ route('siswa.pilih-kelas') }}" class="btn btn-secondary mb-3">← Kembali ke Pilihan Kelas</a>

    <h3>Daftar Siswa Kelas {{ $kelas }}</h3>

    <a href="{{ route('siswa.create', $kelas) }}" class="btn btn-primary mb-3">Tambah Siswa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $siswa)
            <tr>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>{{ $siswa->tanggal_lahir }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td>
                    <a href="{{ route('siswa.edit', [$kelas, $siswa->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('siswa.destroy', [$kelas, $siswa->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
