@extends('component.layout')
@section('content')
    <div class="container-fluid">
        <!-- Row for Stats -->
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card shadow-sm" style="background-color: #e9f7fd; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="card-body text-center">
                        <i class="fas fa-user fa-3x text-primary mb-3"></i>
                        <h5 class="card-title text-primary">Total Petugas</h5>
                        <h3 class="text-primary">{{ $totalPetugas }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm" style="background-color: #eafaf1; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="card-body text-center">
                        <i class="fas fa-tasks fa-3x text-success mb-3"></i>
                        <h5 class="card-title text-success">Total Konten</h5>
                        <h3 class="text-success">{{ $totalKonten }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm" style="background-color: #fff4e5; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-3x text-warning mb-3"></i>
                        <h5 class="card-title text-warning">Total Kelompok</h5>
                        <h3 class="text-warning">{{ $totalKelompok }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
