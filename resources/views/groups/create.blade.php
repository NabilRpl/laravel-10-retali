@extends('component.layout')

@section('content')
<h1 class="mt-4">Buat Kelompok Baru</h1>
<a href="{{ route('groups.index') }}" class="btn btn-primary mb-3">Kembali</a>
<form action="{{ route('groups.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nama Kelompok</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="jumlah_jamaah">Jumlah Jamaah</label>
        <input type="number" name="jumlah_jamaah" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
        <input type="date" name="tanggal_keberangkatan" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tanggal_kembali">Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
