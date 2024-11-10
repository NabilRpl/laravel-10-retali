@extends('component.layout')
@section('content')
<h1 class="mt-4">Manajemen User</h1>
<a href="{{ route('userManajement.create') }}" class="btn btn-primary mb-3">Tambah User</a>

<!-- Tabel Manajemen User -->
<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>Admin</td>
            <td>
                <a href="{{ route('userManajement.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <a href="{{ route('kloter.index', $user->id) }}" class="btn btn-success btn-sm">Kloter</a>
                <button class="btn btn-danger btn-sm">Hapus</button>
            </td>
        </tr>
        @empty
            <td colspan="5">Tidak ada data</td>
        @endforelse
    </tbody>
</table>
@endsection