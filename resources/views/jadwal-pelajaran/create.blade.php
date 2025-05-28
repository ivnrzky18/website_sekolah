@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Tambah Jadwal Pelajaran Kelas {{ $kelas }}</h3>

    <form action="{{ route('jadwal-pelajaran.store') }}" method="POST">
        @csrf
        <input type="hidden" name="kelas" value="{{ $kelas }}">

        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <select name="hari" id="hari" class="form-control" required>
                <option value="">-- Pilih Hari --</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jam_mulai" class="form-label">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jam_selesai" class="form-label">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
            <input type="text" name="mata_pelajaran" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nama_guru" class="form-label">Nama Guru</label>
            <input type="text" name="nama_guru" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('jadwal-pelajaran.index', $kelas) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
