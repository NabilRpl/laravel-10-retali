@extends('component.layout')

@section('content')
<h1 class="mt-4">Edit Kelompok</h1>
<form action="{{ route('groups.update', $group->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nama Kelompok</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $group->name) }}">
    </div>
    <div class="form-group">
        <label for="jumlah_jamaah">Jumlah Jamaah</label>
        <input type="number" class="form-control" id="jumlah_jamaah" name="jumlah_jamaah" value="{{ old('jumlah_jamaah', $group->jumlah_jamaah) }}">
    </div>
    <div class="form-group">
        <label for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
        <input type="date" class="form-control" id="tanggal_keberangkatan" name="tanggal_keberangkatan" value="{{ old('tanggal_keberangkatan', $group->tanggal_keberangkatan) }}">
    </div>
    <div class="form-group">
        <label for="tanggal_kembali">Tanggal Kembali</label>
        <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="{{ old('tanggal_kembali', $group->tanggal_kembali) }}">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi">{{ old('deskripsi', $group->deskripsi) }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
@endsection
