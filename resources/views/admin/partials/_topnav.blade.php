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