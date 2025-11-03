<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Mediatama</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0d6efd 30%, #6ea8fe 100%);
            font-family: 'Figtree', sans-serif;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-5">
            <div class="card p-4">
                <div class="card-body">
                    <h3 class="text-center text-primary mb-3">🎬 Mediatama</h3>
                    <h5 class="text-center mb-4">Create an Account</h5>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email address</label>
                            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input id="password" type="password" name="password" class="form-control" required>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary py-2">Register</button>
                        </div>
                    </form>

                    <hr class="my-3">

                    <div class="text-center">
                        <p class="small mb-0">Already have an account?
                            <a href="{{ route('login') }}" class="text-primary fw-semibold text-decoration-none">
                                Log in here
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <p class="text-center text-white mt-4 small">&copy; {{ date('Y') }} Mediatama - All Rights Reserved</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
