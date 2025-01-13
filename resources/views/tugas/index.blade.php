@extends('component.layout')
@section('content')
<h1 class="mt-4">Manajemen Tugas Kloter {{ $kloter->nama ?? '' }}</h1>
<a href="{{ route('kloter.index', $kloter->tourguide_id ?? 1) }}" class="btn btn-primary mb-3">kembali</a>

<!-- Tabel Manajemen User -->
<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($tugass as $tugas)
        <tr>
            <td>{{ $tugas->id }}</td>
            <td>{{ $tugas->nama }}</td>
            <td>{{ $tugas->created_at }}</td>
            <td>
                <a href="{{ route('tugas.show', $tugas->id) }}" class="btn btn-warning btn-sm">Tugas</a>
            </td>
        </tr>
        @empty
            <td colspan="5">Tidak ada data</td>
        @endforelse
    </tbody>
</table>
@endsection
