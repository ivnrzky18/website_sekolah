@extends('layouts.admin')

@section('content')
<div class="container my-4">
  <div class="card shadow-lg border-0 rounded-4">
    <div class="card-header bg-primary text-white rounded-top-4 d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
        <i class="fas fa-bullhorn fa-lg me-2"></i>
        <h5 class="mb-0 fw-bold">Pengumuman Terbaru</h5>
      </div>
      <a href="{{ route('pengumuman.create') }}" class="btn btn-light btn-sm fw-semibold">
        + Tambah
      </a>
    </div>
    <div class="card-body">

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @forelse($pengumuman as $item)
        <div class="mb-3">
          <h6 class="fw-semibold">📌 {{ $item->judul }}</h6>
          <p class="text-muted mb-1">
            {{ $item->isi }}
          </p>
          <small class="text-secondary">Diumumkan: {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</small>

          <div class="mt-2">
            <a href="{{ route('pengumuman.edit', $item->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
            <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
          </div>

          <hr>
        </div>
      @empty
        <p class="text-muted">Belum ada pengumuman.</p>
      @endforelse

    </div>
  </div>
</div>
@endsection
