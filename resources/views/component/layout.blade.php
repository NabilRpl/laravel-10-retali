<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retali</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        #sidebar-wrapper {
            background: linear-gradient(45deg, #6f42c1, #563d7c);
            color: #fff;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        #sidebar-wrapper .list-group-item {
            background: transparent;
            border: none;
            color: #fff;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
        }

        #sidebar-wrapper .list-group-item:hover {
            background-color: #4e2c9e;
            transform: translateX(5px);
        }

        #sidebar-wrapper .list-group-item i {
            margin-right: 10px;
        }

        .navbar {
            background-color: #6f42c1;
        }

        .navbar .nav-link {
            color: #fff;
            font-weight: bold;
            transition: color 0.3s;
        }

        .navbar .nav-link:hover {
            color: #ffc107;
        }

        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }

        .container-fluid {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .text-center img {
            margin-bottom: 20px;
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            #sidebar-wrapper {
                display: none;
            }

            #wrapper.toggled #sidebar-wrapper {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="d-flex" id="wrapper">
        <div id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <!-- Logo -->
                <div class="text-center my-3">
                    <img src="{{ asset('assets/logoretali.jpg') }}" alt="Logo" class="img-fluid" style="max-width: 80px;">
                </div>
                <a href="{{ route('user.dashboard') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="{{ route('userManajement.index') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-user"></i> Petugas
                </a>
                <a href="{{ route('tugaskonten.index') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-tasks"></i> Tugas Konten
                </a>
                <a href="{{ route('groups.index') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-users"></i> Kelompok
                </a>
                <a href="{{ route('jamaah.index') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-users"></i> Jamaah
                </a>
            </div>
        </div>

        <!-- Page Content -->
        <div class="w-100" id="page-content-wrapper">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="btn btn-primary" id="menu-toggle">Menu</button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('user.dashboard')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid mt-4">
                <h1 class="text-center" style="color: #6f42c1;"></h1>
                <p class="text-center text-muted"></p>
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
</html>
