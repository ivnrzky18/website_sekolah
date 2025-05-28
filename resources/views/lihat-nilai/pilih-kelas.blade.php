@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Pilih Kelas untuk Melihat Nilai</h3>
    <ul class="list-group mt-3">
        <li class="list-group-item list-group-item-action"><a href="{{ route('lihat-nilai.index', 10) }}">Kelas 10</a></li>
        <li class="list-group-item list-group-item-action"><a href="{{ route('lihat-nilai.index', 11) }}">Kelas 11</a></li>
        <li class="list-group-item list-group-item-action"><a href="{{ route('lihat-nilai.index', 12) }}">Kelas 12</a></li>
    </ul>
</div>
@endsection
