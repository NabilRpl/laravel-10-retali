@extends('component.layout')

@section('content')
<h1 class="mt-4">Tambah Petugas</h1>
<form action="{{ route('userManajement.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="phone" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
    </div>
    <div class="form-group">
        <label for="group_id">Nama Kelompok</label>
        <select class="form-control" id="groups_id" name="groups_id">
            <option value="">Pilih Kelompok</option>
            @foreach ($groups as $group)
                <option value="{{ $group->id }}" {{ old('group_id') == $group->id ? 'selected' : '' }}>
                    {{ $group->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
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
