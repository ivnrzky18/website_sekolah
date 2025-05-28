@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h3 class="mb-4">Hubungi Kami</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('kontak.kirim') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="subjek" class="form-label">Subjek</label>
            <input type="text" class="form-control" id="subjek" name="subjek" required>
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
    </form>
</div>
@endsection
