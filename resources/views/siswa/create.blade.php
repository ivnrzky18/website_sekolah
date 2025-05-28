@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Tambah Siswa Kelas {{ $kelas }}</h3>

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <input type="hidden" name="kelas" value="{{ $kelas }}">

        <div class="form-group">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
