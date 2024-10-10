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
    <style>
        /* Search and Notification Panels */
        .search-panel, .notification-panel {
            position: fixed;
            top: 50px;
            right: 20px;
            width: 300px; /* Adjusted width */
            background: white;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 1051;
            display: none;
            border-radius: 5px; /* Rounded corners */
        }

        /* Arrow Indicator pointing to the icons */
        .arrow-indicator {
            position: absolute;
            top: -10px;
            right: 20px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid white; /* The color of the arrow */
            z-index: 1052;
        }

        /* Overlay for focus */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1050;
            display: none;
        }

        /* Search input styling */
        .dashboard-search {
            border-radius: 20px; /* Rounded search bar */
        }
    </style>
</head>
<body>

<div id="app" class="d-flex flex-nowrap" style="height: 100vh;">
                        <!-- Sidebar -->
 <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-black bg-white z-index-mobile" id="sidebar">
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
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                        <i class="bi bi-file-bar-graph me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" aria-current="page">
                        <i class="bi bi-cart2 me-2"></i>
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" aria-current="page">
                        <i class="bi bi-easel2 me-2"></i>
                        Designer Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" aria-current="page">
                        <i class="bi bi-floppy me-2"></i>
                        Saved Designs
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" aria-current="page">
                        <i class="bi bi-archive me-2"></i>
                        Archives
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" aria-current="page">
                        <i class="bi bi-gear me-2"></i>
                        Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" aria-current="page">
                        <i class="bi bi-info-circle me-2"></i>
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
    <!-- Main Content Area -->
    <div class="flex-grow-1 d-flex flex-column">
        
       <nav class="navbar navbar-expand-lg navbar-light bg-light top-nav">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <!-- Sidebar Toggle Icon -->
        <a href="#" class="toggle-sidebar me-3" id="toggleSidebar">
            <i id="toggleSidebarIcon" class="bi bi-list"></i>
        </a>

        <!-- Dashboard and Date -->
        <div class="d-flex flex-column text-start dashboard-text">
            <strong class="text-black" style="font-size:16px;">Dashboard</strong>
            <span class="text-black" style="font-size:12px;">October 12, 2024</span>
        </div>

        <!-- Centered Logo -->
        <div class="mx-auto text-center">
            <a href="#">
                <img src="{{ asset('./images/shenhuh.png') }}" alt="Logo" style="height: 40px;"> <!-- Adjust height as needed -->
            </a>
        </div>

        <!-- Navbar Icons (Search, Bell) -->
        <ul class="navbar-nav d-flex flex-row gap-4">
            <!-- Search Icon -->
            <li class="nav-item me-2">
                <a class="nav-link position-relative" href="#">
                    <i class="bi bi-search" id="searchToggle"></i>
                </a>
            </li>
            <!-- Bell Icon -->
            <li class="nav-item me-2">
                <a class="nav-link position-relative" href="#">
                    <i class="bi bi-bell" id="notificationToggle"></i>
                    <span class="position-absolute translate-middle p-1 bg-danger border border-light rounded-circle" style="top: 57%; left: 67%;">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</nav>




        <!-- Wider Search Panel with Arrow Indicator -->
        <div class="arrow-indicator" id="indicator"></div> <!-- Arrow pointing to the search icon -->
        <div class="search-panel" id="searchPanel">
            <form class="d-flex w-100" role="search">
                <input class="form-control me-2 dashboard-search" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>

        <div class="notification-panel" id="notificationPanel">
            <h6>Notifications</h6>
            <ul class="list-group">
                <li class="list-group-item">Notification 1</li>
                <li class="list-group-item">Notification 2</li>
                <li class="list-group-item">Notification 3</li>
            </ul>
        </div>

        <!-- Overlay -->
        <div class="overlay" id="overlay"></div>
        <button id="load-content1">Load Dynamic Content 1</button>
    <button id="load-content2">Load Dynamic Content 2</button>
    <div id="content-panel"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to load content based on type
            function loadContent(contentType) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '{{ url('/dynamic-content') }}/' + contentType, true);

                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        document.getElementById('content-panel').innerHTML = xhr.responseText;
                    } else {
                        console.error('Request failed. Status:', xhr.status);
                    }
                };

                xhr.onerror = function() {
                    console.error('Network Error');
                };

                xhr.send();
            }

            // Event listener for the first button
            document.getElementById('load-content1').addEventListener('click', function() {
                loadContent('content1'); // Load first content
            });

            // Event listener for the second button
            document.getElementById('load-content2').addEventListener('click', function() {
                loadContent('content2'); // Load second content
            });
        });
    </script>
        <!-- Main Content Area -->
        <main class="py-4 w-100" style="height: calc(100vh - 50px); overflow-y: auto;">
            @yield('content')
        </main>
    </div>
</div>

<!-- JavaScript -->
<script>
    function positionArrow(arrow, icon) {
        const iconRect = icon.getBoundingClientRect();
        const arrowWidth = 20; // Width of the arrow (10px left and right)
        const arrowHeight = 10; // Height of the arrow
        
        // Position the arrow above the icon
        arrow.style.top = `${iconRect.top + 24}px`;
        arrow.style.left = `${iconRect.left}px`;
        console.log(arrow.style.left)
    }

    // Toggle search panel and overlay
    document.getElementById('searchToggle').addEventListener('click', function() {
        const searchPanel = document.getElementById('searchPanel');
        const notificationPanel = document.getElementById('notificationPanel');
        const overlay = document.getElementById('overlay');
        const isVisible = searchPanel.style.display === 'block';

        // Hide notification panel if it's open
        notificationPanel.style.display = 'none';

        // Toggle search panel
        if (!isVisible) {
            searchPanel.style.display = 'block';
            document.getElementById('indicator').style.display = 'block';
            overlay.style.display = 'block';
            positionArrow(document.getElementById('indicator'), document.getElementById('searchToggle'));
        } else {
            searchPanel.style.display = 'none';
            overlay.style.display = 'none';
        }
    });

    // Toggle notification panel and overlay
    document.getElementById('notificationToggle').addEventListener('click', function() {
        const notificationPanel = document.getElementById('notificationPanel');
        const searchPanel = document.getElementById('searchPanel');
        const overlay = document.getElementById('overlay');
        const isVisible = notificationPanel.style.display === 'block';

        // Hide search panel if it's open
        searchPanel.style.display = 'none';

        // Toggle notification panel
        if (!isVisible) {
            notificationPanel.style.display = 'block';
            document.getElementById('indicator').style.display = 'block';
            overlay.style.display = 'block';
            positionArrow(document.getElementById('indicator'), document.getElementById('notificationToggle'));
        } else {
            notificationPanel.style.display = 'none';
            overlay.style.display = 'none';
        }
    });

    // Hide both panels when overlay is clicked
    document.getElementById('overlay').addEventListener('click', function() {
        document.getElementById('searchPanel').style.display = 'none';
        document.getElementById('notificationPanel').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('indicator').style.display = 'none';
    });

    // // Toggle sidebar visibility
    // document.getElementById('toggleSidebar').addEventListener('click', function() {
    //     const sidebar = document.getElementById('sidebar');
    //     sidebar.classList.toggle('d-none');
    // });


</script>

</body>
</html>
