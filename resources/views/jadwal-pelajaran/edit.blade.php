@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Edit Jadwal Kelas {{ $jadwal->kelas }}</h3>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jadwal-pelajaran.update', $jadwal->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <input type="hidden" name="kelas" value="{{ $jadwal->kelas }}">

        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <input type="text" name="hari" id="hari" class="form-control" value="{{ $jadwal->hari }}" required>
        </div>

        <div class="mb-3">
            <label for="jam_mulai" class="form-label">Jam Mulai</label>
            <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" value="{{ $jadwal->jam_mulai }}" required>
        </div>

        <div class="mb-3">
            <label for="jam_selesai" class="form-label">Jam Selesai</label>
            <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" value="{{ $jadwal->jam_selesai }}" required>
        </div>

        <div class="mb-3">
            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
            <input type="text" name="mata_pelajaran" id="mata_pelajaran" class="form-control" value="{{ $jadwal->mata_pelajaran }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_guru" class="form-label">Nama Guru</label>
            <input type="text" name="nama_guru" id="nama_guru" class="form-control" value="{{ $jadwal->nama_guru }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('jadwal-pelajaran.index', $jadwal->kelas) }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
