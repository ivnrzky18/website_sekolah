@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Edit Pengumuman</h3>
    <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $pengumuman->judul }}" required>
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" rows="4" class="form-control" required>{{ $pengumuman->isi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $pengumuman->tanggal }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
