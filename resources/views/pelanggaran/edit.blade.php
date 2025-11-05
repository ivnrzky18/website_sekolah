@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h4 class="fw-bold mb-4 text-warning"><i class="bi bi-pencil-square me-2"></i>Edit Jenis Pelanggaran</h4>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('pelanggaran.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama Pelanggaran</label>
                    <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Poin</label>
                    <input type="number" name="poin" class="form-control" value="{{ $item->poin }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="ringan" {{ $item->kategori == 'ringan' ? 'selected' : '' }}>Ringan</option>
                        <option value="sedang" {{ $item->kategori == 'sedang' ? 'selected' : '' }}>Sedang</option>
                        <option value="berat" {{ $item->kategori == 'berat' ? 'selected' : '' }}>Berat</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3">{{ $item->keterangan }}</textarea>
                </div>

                <button type="submit" class="btn btn-warning text-white"><i class="bi bi-save me-1"></i> Update</button>
                <a href="{{ route('pelanggaran.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left-circle me-1"></i> Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
