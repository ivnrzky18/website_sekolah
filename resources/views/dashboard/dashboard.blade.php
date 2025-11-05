@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Kartu Jumlah Siswa -->
        <div class="col-md-4 mb-4">
            <div class="card card-custom text-center p-3">
                <div class="card-body">
                    <i class="bi bi-people-fill fs-1 text-primary"></i>
                    <h5 class="mt-2">Siswa</h5>
                    <h2>{{ $jumlahSiswa }}</h2>
                </div>
            </div>
        </div>

        <!-- Kartu Jumlah Guru -->
        <div class="col-md-4 mb-4">
            <div class="card card-custom text-center p-3">
                <div class="card-body">
                    <i class="bi bi-person-vcard-fill fs-1 text-success"></i>
                    <h5 class="mt-2">Guru</h5>
                    <h2>{{ $jumlahGuru }}</h2>
                </div>
            </div>
        </div>

        <!-- Kartu Jumlah Kelas -->
        <div class="col-md-4 mb-4">
            <div class="card card-custom text-center p-3">
                <div class="card-body">
                    <i class="bi bi-building-fill fs-1 text-warning"></i>
                    <h5 class="mt-2">Kelas</h5>
                    <h2>14</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Pelanggaran Siswa -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-body">
                    <h5 class="mb-3">
                        <i class="bi bi-exclamation-triangle-fill text-warning me-2"></i> Top Pelanggaran Siswa
                    </h5>
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Rank</th>
                                <th>Nama Siswa</th>
                                <th>Total Poin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($topPelanggaran as $index => $siswa)
                                <tr>
                                    <td><strong>{{ $index + 1 }}</strong></td>
                                    <td>{{ $siswa->nama_siswa }}</td>
                                    <td><span class="badge bg-danger">{{ $siswa->total_poin }}</span></td>
                                    <td>
                                        <a href="{{ route('data-pelanggaran.poin') }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye-fill me-1"></i> Lihat Pelanggaran
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada data pelanggaran</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
