<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    {{-- @vite('resources/js/app.js') --}}
</head>

<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar bg-dark text-white p-3" style="width: 250px;">
            <h3 class="text-center">Dashboard</h3>
            <ul class="nav flex-column mt-4">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('show.login') }}">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content flex-grow-1 p-4">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    {{-- @vite(['resources/js/app.js']) --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    @vite('resources/js/app.js')

    @stack('scripts')
</body>

</html>
