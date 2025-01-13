@extends('component.layout')

@section('content')
<h1 class="mt-4">Tambah Tugas Konten</h1>
<form action="{{ route('tugaskonten.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" id="judul" name="judul"">
    </div>
    <div class="form-group">
        <label for="deskripsi">deskripsi</label>
        <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" style="height: 500px"></textarea>
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
