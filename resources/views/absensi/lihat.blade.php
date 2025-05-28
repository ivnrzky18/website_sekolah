@extends('layouts.admin')

@section('content')
<div class="container my-4">
  <h3 class="mb-3">Lihat Absensi Kelas {{ $kelas }}</h3>
  <form action="{{ route('absensi.lihat') }}" method="GET">
    <input type="hidden" name="kelas" value="{{ $kelas }}">
    <div class="mb-3">
      <label for="tanggal" class="form-label">Pilih Tanggal</label>
      <input type="date" name="tanggal" id="tanggal" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Lihat Absensi</button>
  </form>
</div>
@endsection
