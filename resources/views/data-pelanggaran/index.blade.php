@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3 class="fw-bold text-primary mb-4">
        <i class="bi bi-person-exclamation me-2"></i> Data Pelanggaran Siswa
    </h3>

    <!-- Tombol Tambah Data -->
    <div class="mb-3 text-end">
        <a href="{{ route('data-pelanggaran.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Pelanggaran
        </a>
    </div>

    <!-- Tabel Data -->
    <div class="card shadow-sm border-0">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($items->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Pelanggaran</th>
                            <th>Kategori</th>
                            <th>Poin</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_siswa }}</td>
                                <td>{{ $item->pelanggaran->nama ?? '-' }}</td>
                                <td>
                                    @if($item->pelanggaran->kategori == 'berat')
                                        <span class="badge bg-danger">Berat</span>
                                    @elseif($item->pelanggaran->kategori == 'sedang')
                                        <span class="badge bg-warning text-dark">Sedang</span>
                                    @else
                                        <span class="badge bg-success">Ringan</span>
                                    @endif
                                </td>
                                <td>{{ $item->pelanggaran->poin ?? 0 }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->keterangan ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('data-pelanggaran.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('data-pelanggaran.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $items->links() }}
            </div>
            @else
                <p class="text-center text-muted m-0">Belum ada data pelanggaran siswa.</p>
            @endif
        </div>
    </div>
</div>

<style>
.table-hover tbody tr:hover {
    background-color: #f8f9fa;
}
</style>
@endsection
