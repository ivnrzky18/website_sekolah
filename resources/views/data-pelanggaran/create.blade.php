@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3 class="fw-bold text-primary mb-4">
        <i class="bi bi-person-plus-fill me-2"></i> Tambah Pelanggaran Siswa
    </h3>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('data-pelanggaran.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" placeholder="Masukkan nama siswa" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Pelanggaran</label>
                    <select name="id_pelanggaran" class="form-select" required>
                        <option value="">-- Pilih Pelanggaran --</option>
                        @foreach($pelanggaran as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }} ({{ ucfirst($p->kategori) }} - {{ $p->poin }} poin)</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Kejadian</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3" placeholder="Opsional"></textarea>
                </div>

                <div class="text-end">
                    <a href="{{ route('data-pelanggaran.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
