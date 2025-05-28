@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Pilih Kelas untuk Input Nilai</h3>

    <div class="list-group mt-3">
        <a href="{{ route('nilai.index', '10') }}" class="list-group-item list-group-item-action">Kelas 10</a>
        <a href="{{ route('nilai.index', '11') }}" class="list-group-item list-group-item-action">Kelas 11</a>
        <a href="{{ route('nilai.index', '12') }}" class="list-group-item list-group-item-action">Kelas 12</a>
    </div>
</div>
@endsection
