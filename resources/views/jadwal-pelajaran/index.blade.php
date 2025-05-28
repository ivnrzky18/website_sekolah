@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Jadwal Pelajaran</h3>

    <!-- Menampilkan pilihan kelas -->
    <div class="mb-3">
        <a href="{{ route('jadwal-pelajaran.index', '10') }}" class="btn {{ $kelas == '10' ? 'btn-primary' : 'btn-outline-primary' }}">Kelas 10</a>
        <a href="{{ route('jadwal-pelajaran.index', '11') }}" class="btn {{ $kelas == '11' ? 'btn-primary' : 'btn-outline-primary' }}">Kelas 11</a>
        <a href="{{ route('jadwal-pelajaran.index', '12') }}" class="btn {{ $kelas == '12' ? 'btn-primary' : 'btn-outline-primary' }}">Kelas 12</a>
    </div>

    <!-- Jika sudah memilih kelas, tampilkan tombol tambah jadwal -->
    @if($kelas)
        <a href="{{ route('jadwal-pelajaran.create', $kelas) }}" class="btn btn-success mb-3">Tambah Jadwal</a>
        <h5>Kelas {{ $kelas }}</h5>

        <!-- Tampilkan tabel berdasarkan hari -->
        @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat',] as $day)
            <h4 class="mt-4">{{ $day }}</h4>

            @if(isset($grouped[$day]) && count($grouped[$day]) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Mata Pelajaran</th>
                                <th>Guru</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grouped[$day] as $jadwal)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                                    <td>{{ $jadwal->mata_pelajaran }}</td>
                                    <td>{{ $jadwal->nama_guru }}</td>
                                    <td>
                                        <a href="{{ route('jadwal-pelajaran.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('jadwal-pelajaran.destroy', $jadwal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>Belum ada jadwal untuk {{ $day }}.</p>
            @endif
        @endforeach
    @endif
</div>
@endsection
