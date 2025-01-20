@extends('component.layout')
@section('content')
    <h1 class="mt-4">Jamaah</h1>
    <a href="{{ route('jamaah.create') }}" class="btn btn-primary mb-3">Tambah Jamaah</a>

    <!-- Tabel Manajemen User -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Kelompok</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Catatan Kesehatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jamaahs as $index => $jamaah)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><img class="img-fluid img-thumbnail" style="height: 100px" src="{{ asset('storage/' . $jamaah->foto) }}" alt="{{ $jamaah->foto }}"></td>
                    <td>{{ $jamaah->name }}</td>
                    <td>{{ $jamaah->group->name }}</td>
                    <td>{{ $jamaah->no_hp }}</td>
                    <td>{{ $jamaah->alamat }}</td>
                    <td>{{ $jamaah->jenis_kelamin }}</td>
                    <td>{{ $jamaah->catatan_kesehatan }}</td>
                    <td>
                        <a href="{{ route('jamaah.edit', $jamaah->id) }}" class="btn btn-warning btn-sm mb-2 mb-md-0 mr-md-2">Edit</a>
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
