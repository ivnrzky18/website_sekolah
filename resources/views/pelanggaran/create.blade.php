@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h4 class="fw-bold mb-4 text-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Jenis Pelanggaran</h4>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('pelanggaran.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Pelanggaran</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama pelanggaran" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Poin</label>
                    <input type="number" name="poin" class="form-control" placeholder="Masukkan poin" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="ringan">Ringan</option>
                        <option value="sedang">Sedang</option>
                        <option value="berat">Berat</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3" placeholder="Opsional"></textarea>
                </div>

                <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Simpan</button>
                <a href="{{ route('pelanggaran.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle me-1"></i> Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
