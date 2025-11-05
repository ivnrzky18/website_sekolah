@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h4 class="fw-bold text-primary">Detail Pelanggaran Siswa</h4>
    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Nama Siswa:</strong> {{ $item->nama_siswa }}</p>
            <p><strong>Pelanggaran:</strong> {{ $item->pelanggaran->nama }}</p>
            <p><strong>Poin:</strong> {{ $item->pelanggaran->poin }}</p>
            <p><strong>Tanggal:</strong> {{ $item->tanggal }}</p>
            <p><strong>Keterangan:</strong> {{ $item->keterangan ?? '-' }}</p>
        </div>
    </div>
    <a href="{{ route('data-pelanggaran.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
