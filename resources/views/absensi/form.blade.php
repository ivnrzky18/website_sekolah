@extends('layouts.admin')

@section('content')
<div class="container my-4">
  <div class="card shadow rounded-4">
    <div class="card-header bg-success text-white rounded-top-4">
      <h5 class="mb-0">Form Absensi - Kelas {{ $kelas }} ({{ $tanggal }})</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('absensi.store') }}" method="POST">
        @csrf
        <input type="hidden" name="kelas" value="{{ $kelas }}">
        <input type="hidden" name="tanggal" value="{{ $tanggal }}">

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nama Siswa</th>
              <th>Hadir</th>
              <th>Izin</th>
              <th>Sakit</th>
              <th>Alpa</th>
            </tr>
          </thead>
          <tbody>
            @foreach($siswa as $s)
            <tr>
              <td>{{ $s->nama }}</td>
              <td><input type="radio" name="absensi[{{ $loop->index }}][status]" value="hadir" required></td>
              <td><input type="radio" name="absensi[{{ $loop->index }}][status]" value="izin"></td>
              <td><input type="radio" name="absensi[{{ $loop->index }}][status]" value="sakit"></td>
              <td><input type="radio" name="absensi[{{ $loop->index }}][status]" value="alpa"></td>
              <input type="hidden" name="absensi[{{ $loop->index }}][siswa_id]" value="{{ $s->id }}">
            </tr>
            @endforeach
          </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Simpan Absensi</button>
      </form>
    </div>
  </div>
</div>
@endsection
