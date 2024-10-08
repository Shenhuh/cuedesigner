<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div id="app" class="d-flex flex-nowrap" style="height: 100vh;">
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-black bg-white" id="sidebar">
        <div class="d-flex justify-content-center align-items-center mb-3 mb-md-0 text-black text-decoration-none">
            <img src="https://github.com/mdo.png" alt="" width="48" height="48" class="rounded-circle me-3">
            <div class="d-flex flex-column text-center">
                <strong class="text-black" style="font-size:16px;">Allen Bal</strong>
                <span class="text-black" style="font-size:12px;">Administrator</span>
            </div>
        </div>
        <div class="container overflow-y-auto">

            <hr>
            <ul class="nav nav-pills admin-nav flex-column mb-auto">           
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link active">
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
                        <i class="bi bi-brush me-4"></i>
                        Saved Designs
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-black">
                        <i class="bi bi-easel2 me-4"></i>
                        Designer Settings
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-black">
                        <i class="bi bi-people me-4"></i>
                        Users
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-black">
                        <i class="bi bi-archive me-4"></i>
                        Archives
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-black">
                        <i class="bi bi-gear me-4"></i>
                        Settings
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-black">
                        <i class="bi bi-info-circle me-4"></i>
                        About
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
    </div>

    <!-- Main Content (Top Navbar and Content Area) -->
    <div class="flex-grow-1 d-flex flex-column">
        <!-- Top Navbar inside the content area -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a href="#" id="toggleSidebar" class="me-3 d-lg-none">
                    <i id="toggleSidebarIcon" class="bi bi-list"></i>
                </a>
                <div class="d-flex flex-column flex-grow-1">
                    <strong class="text-black" style="font-size:16px;">Dashboard</strong>
                    <span class="text-black" style="font-size:12px;">October 12, 2024</span>
                </div>
                
                <!-- Centered Search Bar -->
                <div class="d-none d-lg-block mx-auto" style="width: 50%;">
                    <form class="d-flex w-100" role="search">
                        <input class="form-control me-2 dashboard-search" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </div>

                <ul class="navbar-nav ms-auto d-flex flex-row">
                    <li class="nav-item me-2">
                        <a class="nav-link position-relative" href="#">
                            <i class="bi bi-bell"></i>
                            <span class="position-absolute translate-middle p-1 bg-danger border border-light rounded-circle" style="top: 57%; left:67%;">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link position-relative" href="#">
                            <i class="bi bi-bell"></i>
                            <span class="position-absolute translate-middle p-1 bg-danger border border-light rounded-circle" style="top: 57%; left:67%;">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <!-- Main Content Area -->
        
    </div>
    <main class="py-4 w-100" style="height: 100vh; overflow-y: auto;">
        @yield('content')
    </main>
</div>

</body>
</html>
