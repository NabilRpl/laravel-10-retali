@extends('component.layout')
@section('content')
<h1 class="mt-4">Tugas</h1>
<a href="{{ route('userManajement.index') }}" class="btn btn-primary mb-3">kembali</a>

<!-- Tabel Manajemen User -->
<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>No</th>
            <th>timestamp</th>
            <th>Nomor Koper</th>
            <th>Nama Jamaah</th>
            <th>Nomer HP</th>
            <th>Kloter</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $data)
        <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->timestamp }}</td>
            <td>{{ $data->nomor_koper }}</td>
            <td>{{ $data->nama_jamaah }}</td>
            <td>{{ $data->nomor_hp }}</td>
            <td>{{ $data->kloter_id }}</td>
        </tr>
        @empty
            <td colspan="5">Tidak ada data</td>
        @endforelse
    </tbody>
</table>
@endsection