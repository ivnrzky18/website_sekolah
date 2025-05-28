@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h3>Pilih Kelas</h3>
    <div class="row">
        @foreach(['10', '11', '12'] as $kelas)
            <div class="col-md-4">
                <a href="{{ route('siswa.index', $kelas) }}" class="btn btn-outline-primary btn-block mb-3">
                    Kelas {{ $kelas }}
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
