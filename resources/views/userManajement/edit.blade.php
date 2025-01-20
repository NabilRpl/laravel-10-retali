@extends('component.layout')

@section('content')
<h1 class="mt-4">Tambah Petugas</h1>
<a href="{{ route('userManajement.index') }}" class="btn btn-primary mb-3">Kembali</a>
<form action="{{ route('userManajement.update', $user->id) }}" method="POST">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" value="{{ $user->name }}" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" value="{{ $user->email }}" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="phone" value="{{ $user->phone }}" class="form-control" id="phone" name="phone">
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="location" value="{{ $user->location }}" class="form-control" id="location" name="location">
    </div>
    <div class="form-group">
        <label for="group_id">Nama Kelompok</label>
        <select class="form-control" id="groups_id" name="groups_id">
            <option value="">Pilih Kelompok</option>
            @foreach ($groups as $group)
                <option value="{{ $group->id }}" {{ $user->groups_id == $group->id ? 'selected' : '' }}>
                    {{ $group->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="isi jika ingin di ubah">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="isi jika ingin di ubah">
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
    <button type="submit" class="btn btn-primary">Ubah</button>
</form>
@endsection
