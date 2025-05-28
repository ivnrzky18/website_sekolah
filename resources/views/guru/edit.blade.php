@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Edit Data Guru</h3>

    <form action="{{ route('guru.update', $guru->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" name="nip" id="nip" value="{{ $guru->nip }}" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{ $guru->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
            <input type="text" class="form-control" name="mata_pelajaran" id="mata_pelajaran" value="{{ $guru->mata_pelajaran }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $guru->tanggal_lahir }}" required>
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L" {{ $guru->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="P" {{ $guru->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat">{{ $guru->alamat }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
