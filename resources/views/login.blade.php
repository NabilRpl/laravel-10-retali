<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container d-flex align-items-center min-vh-100">
        <div class="w-100">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h3 class="text-center mb-4">Login</h3>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Masukkan email" required name="email">
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Masukkan password" required name="password" >
                                    @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                @if (session('error'))
                                <p class="text-danger">{{ session('error') }}</p>
                                @endif
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </form>
                            <p class="text-center mt-3">
                                <a href="#">Lupa password?</a>
                            </p>
                        </div>
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
