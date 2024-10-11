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
    @include('admin.partials._sidebar')
    <!-- Main Content Area -->
    <div class="flex-grow-1 d-flex flex-column">
        
       <!-- Top Nav -->
       @include('admin.partials._topnav')



        <!-- Wider Search Panel with Arrow Indicator -->
        <div class="arrow-indicator" id="indicator"></div> <!-- Arrow pointing to the search icon -->
        @include('admin.partials._search_panel')
        @include('admin.partials._notification_panel')

        <!-- Overlay -->
        <div class="overlay" id="overlay"></div>



        <!-- Main Content Area -->
        <main class="py-4 w-100" style="height: calc(100vh - 50px); overflow-y: auto;">
            @yield('content')
        </main>
    </div>
</div>
<script>
    window.baseUrl = '{{ url("/dynamic-content") }}';
</script>

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
