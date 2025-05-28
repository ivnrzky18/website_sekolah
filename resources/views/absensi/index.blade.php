@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h3 class="mb-3">Pilih Kelas untuk Absensi</h3>
    <form action="{{ route('absensi.create') }}" method="GET">
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <select name="kelas" id="kelas" class="form-select" required>
                <option value="">-- Pilih Kelas --</option>
                @foreach($kelas as $k)
                <option value="{{ e($k) }}">{{ e($k) }}</option></option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lanjut</button>
    </form>
</div>