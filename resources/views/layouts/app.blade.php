<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Mediatama') }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: #0d6efd;
            color: white;
        }
        .sidebar a {
            color: #dfe6f0;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 6px;
        }
        .sidebar a.active, .sidebar a:hover {
            background: #0b5ed7;
            color: #fff;
        }
        .sidebar .logo {
            font-size: 1.4rem;
            font-weight: bold;
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }
        .content {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar p-3">
                <div class="logo">🎬 Mediatama</div>
                <div class="mt-3">
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        🏠 Dashboard
                    </a>
                    <a href="{{ route('videos.index') }}" class="{{ request()->routeIs('videos.*') ? 'active' : '' }}">
                        🎥 Videos
                    </a>
                    <a href="{{ route('requests.index') }}" class="{{ request()->routeIs('requests.*') ? 'active' : '' }}">
                        📩 Requests
                    </a>
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
                            👥 Customers
                        </a>
                    @endif
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 content">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4 rounded-3 px-3">
                    <div class="container-fluid">
                        <span class="navbar-brand fw-semibold text-primary">Welcome, {{ Auth::user()->name }}</span>
                        <div class="d-flex align-items-center">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </nav>

                <!-- Content Area -->
                <div>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
