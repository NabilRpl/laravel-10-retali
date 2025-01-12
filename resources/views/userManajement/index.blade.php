@extends('component.layout')
@section('content')
    <h1 class="mt-4">Petugas</h1>
    <a href="{{ route('userManajement.create') }}" class="btn btn-primary mb-3">Tambah Petugas</a>

    <!-- Tabel Manajemen User -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kelompok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->group ? $user->group->name : 'Tidak ada kelompok' }}</td>
                        <td class="d-flex flex-column flex-md-row">
                            <a href="{{ route('userManajement.edit', $user->id) }}" class="btn btn-warning btn-sm mb-2 mb-md-0 mr-md-2">Edit</a>
                            <a href="{{ route('kloter.index', $user->id) }}" class="btn btn-success btn-sm mb-2 mb-md-0 mr-md-2">Kloter</a>
                            <a href="{{ route('tugaskonten.userkonten', $user->id) }}" class="btn btn-primary btn-sm mb-2 mb-md-0 mr-md-2">Konten</a>
                            <a href="{{ route('datatable.index', $user->id) }}" class="btn btn-primary btn-sm mb-2 mb-md-0 mr-md-2">Data Jamaah</a>
                            <a href="{{ route('userManajement.remind', $user->id) }}" class="btn btn-info btn-sm mb-2 mb-md-0 mr-md-2">Kirim Notifikasi</a>
                            <form action="{{ route('userManajement.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mb-2 mb-md-0">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
