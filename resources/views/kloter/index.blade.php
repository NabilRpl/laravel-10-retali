@extends('component.layout')
@section('content')
<h1 class="mt-4">Manajemen Kloter Tourguide</h1>
<a href="{{ route('userManajement.index') }}" class="btn btn-primary mb-3">kembali</a>
<a href="{{ route('kloter.create', $tourguide_id) }}" class="btn btn-primary mb-3">Tambah Kloter</a>

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
        @forelse ($kloters as $kloter)
        <tr>
            <td>{{ $kloter->id }}</td>
            <td>{{ $kloter->nama }}</td>
            <td>{{ $kloter->tanggal }}</td>
            <td>
                <a href="{{ route('tugas.index', $kloter->id) }}" class="btn btn-warning btn-sm">Tugas</a>
                <button class="btn btn-danger btn-sm">Hapus</button>
            </td>
        </tr>
        @empty
            <td colspan="5">Tidak ada data</td>
        @endforelse
    </tbody>
</table>
@endsection