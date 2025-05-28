@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Edit Siswa Kelas {{ $kelas }}</h3>

    <form action="{{ route('siswa.update', [$kelas, $siswa->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="kelas" value="{{ $kelas }}">

        <div class="form-group">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}" required>
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}" required>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $siswa->tanggal_lahir }}" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control">{{ $siswa->alamat }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
