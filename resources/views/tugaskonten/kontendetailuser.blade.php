@extends('component.layout')
@section('content')
    <h1 class="mt-4">Tugas</h1>
    <a href="{{ route('userManajement.index') }}" class="btn btn-primary mb-3">Kembali</a>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Tugas Konten</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($userkontens as $userkonten)
                <tr>
                    <td>{{ $userkonten->id }}</td>
                    <td>{{ $userkonten->kontentugas->judul }}</td>
                    <td>{{ $userkonten->created_at }}</td>
                    <td>
                        <a href="{{ route('tugaskonten.detailuserkonten', $userkonten->id) }}"
                            class="btn btn-warning btn-sm">Lihat Foto dan Video</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
@endsection
