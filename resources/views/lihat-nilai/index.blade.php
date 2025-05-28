@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Data Nilai Siswa Kelas {{ $kelas }}</h3>

    <div class="mb-3">
        <a href="{{ route('lihat-nilai.pilih-kelas') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
        <a href="{{ route('lihat-nilai.cetak', $kelas) }}" class="btn btn-success">
            <i class="bi bi-printer-fill"></i> Cetak Data
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Semester</th>
                <th>Tahun Ajaran</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($nilais as $nilai)
            <tr>
                <td>{{ $nilai->siswa->nama ?? '-' }}</td>
                <td>{{ $nilai->kelas }}</td>
                <td>{{ $nilai->mapel }}</td>
                <td>{{ $nilai->semester }}</td>
                <td>{{ $nilai->tahun_ajaran }}</td>
                <td>{{ $nilai->nilai }}</td>
                <td>
                    <a href="{{ route('nilai.edit', [$kelas, $nilai->id]) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <form action="{{ route('nilai.destroy', [$kelas, $nilai->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada data nilai untuk kelas ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
