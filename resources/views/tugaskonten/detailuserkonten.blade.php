@extends('component.layout')
@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tugas</h1>
    <a href="{{ route('tugaskonten.detailuserkonten') }}" class="btn btn-primary mb-4">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <!-- Konten Foto dan Video -->
    <div class="row">
        <!-- Foto -->
        @if ($detailkonten->foto)
            @foreach (json_decode($detailkonten->foto) as $foto)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <a href="{{ asset('storage/' . $foto) }}" target="_blank">
                            <img src="{{ asset('storage/' . $foto) }}" class="card-img-top img-fluid" alt="Foto Konten">
                        </a>
                        <div class="card-body">
                            <p class="card-text text-center">Foto Konten</p>
                            <form action="{{ route('konten.deleteFoto', ['foto' => $foto]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-block">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        <!-- Video -->
        @if ($detailkonten->video)
            <div class="col-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <video controls class="w-100 rounded">
                            <source src="{{ asset('storage/' . $detailkonten->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <p class="mt-2 text-center">Video Konten</p>
                        <form action="{{ route('konten.deleteVideo', ['video' => $detailkonten->video]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
