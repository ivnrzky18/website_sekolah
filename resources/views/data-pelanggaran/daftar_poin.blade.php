@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary mb-0">
            <i class="bi bi-bar-chart-fill me-2 text-danger"></i> Daftar Poin Pelanggaran Siswa
        </h4>
        <a href="{{ route('data-pelanggaran.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Pelanggaran Siswa
        </a>
    </div>

    {{-- Pencarian --}}
    <form method="GET" action="{{ route('data-pelanggaran.poin') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control" placeholder="Cari nama siswa...">
            <button class="btn btn-outline-primary" type="submit">
                <i class="bi bi-search"></i> Cari
            </button>
            @if(!empty($search))
                <a href="{{ route('data-pelanggaran.poin') }}" class="btn btn-outline-secondary ms-2">Reset</a>
            @endif
        </div>
    </form>

    {{-- Tabel --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th>Nama Siswa</th>
                            <th width="12%" class="text-center">Total Poin</th>
                            <th width="25%" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $i => $row)
                            @php
                                $poin = (int) $row->total_poin;
                                if ($poin >= 100) {
                                    $status = 'Dikeluarkan dari Sekolah';
                                    $badge = 'bg-dark text-white';
                                } elseif ($poin >= 90) {
                                    $status = 'Surat Peringatan 3';
                                    $badge = 'bg-danger text-white';
                                } elseif ($poin >= 80) {
                                    $status = 'Surat Peringatan 2';
                                    $badge = 'bg-warning text-dark';
                                } elseif ($poin >= 70) {
                                    $status = 'Surat Peringatan 1';
                                    $badge = 'bg-info text-dark';
                                } else {
                                    $status = 'Aman';
                                    $badge = 'bg-success text-white';
                                }
                            @endphp
                            <tr>
                                <td class="text-center">{{ $i + 1 }}</td>
                                <td class="fw-semibold">{{ $row->nama_siswa }}</td>
                                <td class="text-center">
                                    <span class="badge {{ $badge }} fs-6">{{ $poin }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="badge {{ $badge }} px-3 py-2">{{ $status }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="bi bi-info-circle me-2"></i> Belum ada data pelanggaran siswa.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Catatan kecil --}}
            <div class="mt-3">
                <small class="text-muted">
                    Note: Poin ≥ 70 → SP1 · Poin ≥ 80 → SP2 · Poin ≥ 90 → SP3 · Poin ≥ 100 → Dikeluarkan
                </small>
            </div>
        </div>
    </div>
</div>
@endsection
