@extends('component.layout')

@section('content')
<h1 class="mt-4">Tambah User</h1>
<form action="{{ route('kloter.store', $tourguide_id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nama Kloter</label>
        <input type="text" class="form-control" id="name" name="nama" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
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
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection
