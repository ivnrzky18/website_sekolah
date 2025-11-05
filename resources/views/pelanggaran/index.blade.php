@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary">
            <i class="bi bi-exclamation-triangle-fill me-2 text-danger"></i> Data Jenis Pelanggaran
        </h4>
        <a href="{{ route('pelanggaran.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Jenis Pelanggaran
        </a>
    </div>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tabel --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Pelanggaran</th>
                        <th width="10%">Poin</th>
                        <th width="15%">Kategori</th>
                        <th>Keterangan</th>
                        <th width="18%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td class="text-center">{{ $item->poin }}</td>
                            <td>
                                @if($item->kategori == 'ringan')
                                    <span class="badge bg-success">Ringan</span>
                                @elseif($item->kategori == 'sedang')
                                    <span class="badge bg-warning text-dark">Sedang</span>
                                @else
                                    <span class="badge bg-danger">Berat</span>
                                @endif
                            </td>
                            <td>{{ $item->keterangan ?? '-' }}</td>
                            <td>
                                <a href="{{ route('pelanggaran.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('pelanggaran.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="bi bi-trash-fill"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data pelanggaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

{{-- NOTE --}}
            <div class="alert alert-info mt-4 shadow-sm border-0 rounded-3">
                <div class="d-flex align-items-start">
                    <i class="bi bi-info-circle-fill fs-4 me-3 text-primary"></i>
                    <div>
                        <h6 class="fw-bold mb-2 text-primary">Catatan Penting:</h6>
                        <ul class="mb-0">
                            <li>Jika <strong>poin mencapai 70</strong> maka siswa akan diberi <strong>Surat Peringatan 1</strong>.</li>
                            <li>Jika <strong>poin mencapai 80</strong> maka siswa akan diberi <strong>Surat Peringatan 2</strong>.</li>
                            <li>Jika <strong>poin mencapai 90</strong> maka siswa akan diberi <strong>Surat Peringatan 3</strong>.</li>
                            <li>Jika <strong>poin mencapai 100</strong> maka siswa akan <strong>dikeluarkan dari sekolah</strong>.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
