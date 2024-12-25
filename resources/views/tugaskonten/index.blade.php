@extends('component.layout')
@section('content')
<h1 class="mt-4">Manajemen Tugas Konten</h1>
<a href="{{ route('tugaskonten.create') }}" class="btn btn-primary mb-3">Tambah Tugas</a>

<!-- Tabel Manajemen User -->
<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($TugasKontens as $TugasKonten)
        <tr>
            <td>{{ $TugasKonten->id }}</td>
            <td>{{ $TugasKonten->judul }}</td>
            <td>{{ $TugasKonten->deskripsi }}</td>
        </tr>
        @empty
            <td colspan="5">Tidak ada data</td>
        @endforelse
    </tbody>
</table>
@endsection