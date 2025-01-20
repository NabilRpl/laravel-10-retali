@extends('component.layout')

@section('content')
<h1 class="mt-4">Tambah Petugas</h1>
<form action="{{ route('jamaah.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
    </div>
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="group_id">Nama Kelompok</label>
        <select class="form-control" id="groups_id" name="groups_id">
            <option value="">Pilih Kelompok</option>
            @foreach ($groups as $group)
                <option value="{{ $group->id }}" {{ old('groups_id') == $group->id ? 'selected' : '' }}>
                    {{ $group->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="phone">no HP</label>
        <input type="phone" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
    </div>
    <div class="form-group">
        <label for="location">Alamat</label>
        <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
    </div>
    <div class="form-group">
        <label for="gender">Jenis Kelamin</label>
        <input type="text" class="form-control" id="gender" name="gender" value="{{ old('gender') }}">
    </div>
    <div class="form-group">
        <label for="health_note">Catatan Kesehatan</label>
        <input type="text" class="form-control" id="health_note" name="health_note" value="{{ old('health_note') }}">
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
