@extends('component.layout')

@section('content')
<h1 class="mt-4">Tambah User</h1>
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
        <input type="location" class="form-control" id="location" name="location" value="{{ old('location') }}">
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
