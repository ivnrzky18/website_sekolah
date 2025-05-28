@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Edit Nilai Siswa</h3>

    <form action="{{ route('nilai.update', [$kelas, $nilai->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="siswa_id" class="form-label">Nama Siswa</label>
            <select name="siswa_id" id="siswa_id" class="form-control">
                @foreach($siswas as $siswa)
                    <option value="{{ $siswa->id }}" {{ $siswa->id == $nilai->siswa_id ? 'selected' : '' }}>{{ $siswa->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="mapel" class="form-label">Mata Pelajaran</label>
            <input type="text" name="mapel" class="form-control" value="{{ $nilai->mapel }}" required>
        </div>

        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="number" name="nilai" class="form-control" value="{{ $nilai->nilai }}" required>
        </div>

        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <select name="semester" id="semester" class="form-control" required>
                <option value="Ganjil" {{ $nilai->semester == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                <option value="Genap" {{ $nilai->semester == 'Genap' ? 'selected' : '' }}>Genap</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
            <input type="text" name="tahun_ajaran" class="form-control" value="{{ $nilai->tahun_ajaran }}" required>
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" name="kelas" class="form-control" value="{{ $nilai->kelas }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <a href="{{ route('lihat-nilai.index', $kelas) }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
