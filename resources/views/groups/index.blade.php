@extends('component.layout')

@section('content')
<h1 class="mt-4">Kelompok</h1>
<a href="{{ route('groups.create') }}" class="btn btn-primary mb-3">Buat Kelompok</a>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Nama Kelompok</th>
                <th>Jumlah Jamaah</th>
                <th>Tanggal Keberangkatan</th>
                <th>Tanggal Kembali</th>
                <th style="width: 30%;">Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($groups as $group)
            <tr>
                <td>{{ $group->name }}</td>
                <td>{{ $group->jumlah_jamaah }}</td>
                <td>{{ $group->tanggal_keberangkatan }}</td>
                <td>{{ $group->tanggal_kembali }}</td>
                <td style="word-wrap: break-word; word-break: break-word; white-space: normal;">
                    {{ $group->deskripsi }}
                </td>
                <td class="text-nowrap">
                    <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                    <form action="{{ route('groups.destroy', $group->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus kelompok ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
