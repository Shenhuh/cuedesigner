<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>

<div id="app" class="d-flex" style="height: 100vh;">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-white" style="width: 240px; height: 100vh;">
        <div class="d-flex justify-content-center align-items-center mb-3 mb-md-0 text-black text-decoration-none">
            <img src="https://github.com/mdo.png" alt="" width="48" height="48" class="rounded-circle me-3">
            <div class="d-flex flex-column text-center">
                <strong class="text-black" style="font-size:16px;">Allen Bal</strong>
                <span class="text-black" style="font-size:12px;">Administrator</span>
            </div>
        </div>

        <hr>
        <ul class="nav nav-pills admin-nav flex-column mb-auto">
            <li class="nav-item mb-2">
                <a href="#" class="nav-link active" aria-current="page">
                    <i class="bi bi-house me-4"></i> 
                    Home
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-black">
                    <i class="bi bi-kanban me-4"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-black">
                    <i class="bi bi-cart me-4"></i>
                    Orders
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-black">
                    <i class="bi bi-box-seam me-4"></i>
                    Products
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-black">
                    <i class="bi bi-people me-4"></i>
                    Customers
                </a>
            </li>
        </ul>

        <hr>
        <div class="text-center">
            <a href="#" class="d-flex align-items-center text-black text-decoration-none">
                <i class="bi bi-box-arrow-left me-4"></i>Logout
               
            </a>            
        </div>
    </div>

    <!-- Main Content (Top Navbar and Content Area) -->
    <div class="flex-grow-1 d-flex flex-column">
        <!-- Top Navbar inside the content area -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Left side: Dashboard Title -->
            <div class="d-flex flex-column">
                <strong class="text-black" style="font-size:16px;">Dashboard</strong>
                <span class="text-black" style="font-size:12px;">October 12, 2024</span>
            </div>
            
            <!-- Centered Search Bar -->
            <div class="d-flex mx-auto" style="width: 50%;">
                <form class="d-flex w-100" role="search">
                    <input class="form-control me-2 dashboard-search" type="search" placeholder="Search" aria-label="Search">
                  
                </form>
            </div>

            <!-- Right side: Notifications and User Profile -->
            <ul class="navbar-nav ms-auto">
                <!-- Notifications -->
                <li class="nav-item">
                    <a class="nav-link position-relative" href="#">
                        <i class="bi bi-bell"></i>
                        <span class="position-absolute translate-middle p-1 bg-danger border border-light rounded-circle" style="top: 57%; left:67%;">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    </a>
                </li>

                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="user" width="32" height="32" class="rounded-circle">
                        Allen Bal
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>


        <!-- Main Content Area -->
        <main class="py-4 w-100" style="height:100vh;">
            @yield('content')
        </main>
    </div>
</div>



</body>
</html>
