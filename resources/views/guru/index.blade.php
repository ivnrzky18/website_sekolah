@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Daftar Guru</h2>
    <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Mata Pelajaran</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gurus as $guru)
            <tr>
                <td>{{ $guru->nip }}</td>
                <td>{{ $guru->nama }}</td>
                <td>{{ $guru->mata_pelajaran }}</td>
                <td>{{ $guru->tanggal_lahir }}</td>
                <td>{{ $guru->jenis_kelamin == 'L'  ? 'Laki-laki' : 'Perempuan' }}</td>
                       <td>{{ $guru->alamat }}</td>
                <td>
                    <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
