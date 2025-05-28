@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Tambah Nilai Siswa Kelas {{ $kelas }}</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf
        <input type="hidden" name="kelas" value="{{ $kelas }}">

        <div class="form-group mb-3">
            <label for="siswa_id">Siswa</label>
            <select name="siswa_id" class="form-control" required>
                <option value="">-- Pilih Siswa --</option>
                @foreach($siswas as $siswa)
                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="mapel">Mata Pelajaran</label>
            <input type="text" name="mapel" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="nilai">Nilai</label>
            <input type="number" name="nilai" class="form-control" min="0" max="100" required>
        </div>

        <div class="form-group mb-3">
            <label for="semester">Semester</label>
            <select name="semester" class="form-control" required>
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="tahun_ajaran">Tahun Ajaran</label>
            <input type="text" name="tahun_ajaran" class="form-control" placeholder="Contoh: 2024/2025" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('nilai.index', $kelas) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
