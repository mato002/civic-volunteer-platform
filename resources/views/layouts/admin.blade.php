<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Dashboard') | Civic Volunteering</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 80px;
            --header-height: 70px;
            --footer-height: 50px;
            --primary-color: #3b82f6;
            --primary-hover: #2563eb;
            --secondary-color: #f8fafc;
            --sidebar-text: rgba(255, 255, 255, 0.9);
            --sidebar-text-hover: #ffffff;
            --sidebar-bg-hover: rgba(255, 255, 255, 0.1);
            --content-bg: #f9fafb;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --transition-speed: 0.3s;
            --border-radius: 0.5rem;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: var(--content-bg);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            color: #1f2937;
            line-height: 1.5;
        }
        
        /* Layout */
        .app-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary-color) 0%, #1d4ed8 100%);
            color: var(--sidebar-text);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            transition: all var(--transition-speed) ease;
            overflow: hidden;
        }
        
        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }
        
        .sidebar-brand {
            padding: 1.5rem 1.25rem;
            font-size: 1.25rem;
            font-weight: 600;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
            min-height: var(--header-height);
        }
        
        .sidebar-brand .logo-text {
            transition: all var(--transition-speed) ease;
            white-space: nowrap;
        }
        
        .sidebar-toggle {
            cursor: pointer;
            font-size: 1.25rem;
            transition: transform var(--transition-speed) ease;
        }
        
        .sidebar.collapsed .sidebar-toggle {
            transform: rotate(180deg);
        }
        
        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding: 1rem 0;
            scrollbar-width: thin;
            scrollbar-color: rgba(255,255,255,0.2) transparent;
        }
        
        .sidebar-nav::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar-nav::-webkit-scrollbar-thumb {
            background-color: rgba(255,255,255,0.2);
            border-radius: 3px;
        }
        
        .sidebar-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-nav li a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.25rem;
            margin: 0.25rem 0.5rem;
            color: var(--sidebar-text);
            text-decoration: none;
            transition: all var(--transition-speed) ease;
            border-radius: var(--border-radius);
            font-size: 0.925rem;
            font-weight: 500;
            white-space: nowrap;
        }
        
        .sidebar-nav li a:hover {
            background-color: var(--sidebar-bg-hover);
            color: var(--sidebar-text-hover);
            transform: translateX(3px);
        }
        
        .sidebar-nav li a i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }
        
        .sidebar-nav li.active a {
            background-color: rgba(255, 255, 255, 0.15);
            color: var(--sidebar-text-hover);
            font-weight: 600;
            box-shadow: inset 3px 0 0 white;
        }
        
        .sidebar.collapsed .sidebar-nav li a {
            justify-content: center;
            padding: 0.75rem;
            margin: 0.25rem;
        }
        
        .sidebar.collapsed .sidebar-nav li a i {
            margin-right: 0;
            font-size: 1.25rem;
        }
        
        .sidebar.collapsed .sidebar-nav li a span {
            display: none;
        }
        
        .sidebar.collapsed .sidebar-brand .logo-text {
            opacity: 0;
            width: 0;
            height: 0;
            overflow: hidden;
            margin: 0;
        }
        
        /* Tooltip for collapsed sidebar */
        .sidebar.collapsed .sidebar-nav li {
            position: relative;
        }
        
        .sidebar.collapsed .sidebar-nav li:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            background-color: #1f2937;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            font-size: 0.875rem;
            white-space: nowrap;
            z-index: 1001;
            margin-left: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            pointer-events: none;
        }
        
        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            transition: margin-left var(--transition-speed) ease;
        }
        
        .sidebar.collapsed ~ .main-content {
            margin-left: var(--sidebar-collapsed-width);
        }
        
        /* Header Styles */
        .header {
            height: var(--header-height);
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1.5rem;
        }
        
        .header-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #111827;
            margin: 0;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            position: relative;
            cursor: pointer;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e5e7eb;
        }
        
        .user-name {
            font-weight: 500;
            font-size: 0.925rem;
            transition: all var(--transition-speed) ease;
        }
        
        .sidebar.collapsed ~ .main-content .user-name {
            display: none;
        }
        
        .user-dropdown {
            position: absolute;
            top: calc(100% + 5px);
            right: 0;
            background-color: white;
            min-width: 200px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border-radius: var(--border-radius);
            padding: 0.5rem 0;
            z-index: 101;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.2s ease;
        }
        
        .user-profile:hover .user-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .user-dropdown a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.25rem;
            color: #4b5563;
            text-decoration: none;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }
        
        .user-dropdown a:hover {
            background-color: #f3f4f6;
            color: #111827;
        }
        
        .user-dropdown a i {
            margin-right: 10px;
            width: 18px;
            text-align: center;
            color: #6b7280;
        }
        
        .user-dropdown-divider {
            height: 1px;
            background-color: #e5e7eb;
            margin: 0.25rem 0;
        }
        
        /* Content Styles */
        .content {
            flex: 1;
            padding: 1.5rem;
            background-color: var(--content-bg);
            margin-bottom: var(--footer-height);
        }
        
        /* Footer Styles */
        .footer {
            height: var(--footer-height);
            background-color: white;
            border-top: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            bottom: 0;
            width: calc(100% - var(--sidebar-width));
            margin-left: var(--sidebar-width);
            z-index: 100;
            font-size: 0.8125rem;
            color: #6b7280;
            transition: all var(--transition-speed) ease;
        }
        
        .sidebar.collapsed ~ .main-content .footer {
            width: calc(100% - var(--sidebar-collapsed-width));
            margin-left: var(--sidebar-collapsed-width);
        }
        
        /* Card Styles */
        .card {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            margin-bottom: 1.5rem;
            border: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            font-weight: 600;
            background-color: transparent;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .card-header .card-title {
            margin: 0;
            font-size: 1.1rem;
            color: #111827;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        /* Breadcrumb */
        .breadcrumb {
            background-color: transparent;
            padding: 0.75rem 0;
            margin-bottom: 1.5rem;
        }
        
        .breadcrumb-item {
            font-size: 0.875rem;
        }
        
        .breadcrumb-item a {
            color: #4b5563;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        
        .breadcrumb-item a:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }
        
        .breadcrumb-item.active {
            color: #6b7280;
        }
        
        .breadcrumb-item + .breadcrumb-item::before {
            content: "›";
            padding: 0 0.5rem;
            color: #9ca3af;
        }
        
        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }
        
        /* Badges */
        .badge {
            font-weight: 500;
            padding: 0.35rem 0.65rem;
            font-size: 0.75rem;
        }
        
        /* Tables */
        .table {
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table th {
            background-color: #f9fafb;
            color: #374151;
            font-weight: 600;
            padding: 0.75rem 1.25rem;
            border-top: 1px solid #e5e7eb;
        }
        
        .table td {
            padding: 0.75rem 1.25rem;
            border-top: 1px solid #e5e7eb;
            vertical-align: middle;
        }
        
        .table tr:hover td {
            background-color: #f9fafb;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 1100;
            }
            
            .sidebar.visible {
                transform: translateX(0);
            }
            
            .sidebar-toggle {
                display: block !important;
            }
            
            .main-content {
                margin-left: 0 !important;
            }
            
            .footer {
                width: 100% !important;
                margin-left: 0 !important;
            }
            
            .user-name {
                display: none;
            }
        }
        
        @media (max-width: 768px) {
            .content {
                padding: 1rem;
            }
            
            .card-header, .card-body {
                padding: 1rem;
            }
            
            .header {
                padding: 0 1rem;
            }
        }
        
        @media (max-width: 576px) {
            .header-title {
                font-size: 1.1rem;
            }
        }
        
        /* Animation for sidebar items */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateX(-10px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .sidebar-nav li {
            animation: fadeIn 0.3s ease forwards;
            opacity: 0;
        }
        
        .sidebar-nav li:nth-child(1) { animation-delay: 0.1s; }
        .sidebar-nav li:nth-child(2) { animation-delay: 0.15s; }
        .sidebar-nav li:nth-child(3) { animation-delay: 0.2s; }
        .sidebar-nav li:nth-child(4) { animation-delay: 0.25s; }
        .sidebar-nav li:nth-child(5) { animation-delay: 0.3s; }
        .sidebar-nav li:nth-child(6) { animation-delay: 0.35s; }
        .sidebar-nav li:nth-child(7) { animation-delay: 0.4s; }
        .sidebar-nav li:nth-child(8) { animation-delay: 0.45s; }
        
        /* Loading animation */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .loading {
            animation: pulse 1.5s ease-in-out infinite;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <span class="logo-text">Civic Volunteering</span>
            <i class="fas fa-chevron-left sidebar-toggle" id="sidebarToggle"></i>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li class="active" data-tooltip="Dashboard">
                    <a href="{{ url('/admin/dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li data-tooltip="Organizations">
                    <a href="{{ url('/admin/organizations') }}">
                        <i class="fas fa-building"></i>
                        <span>Organizations</span>
                    </a>
                </li>
                <li data-tooltip="Opportunities">
                    <a href="{{ url('/admin/opportunities') }}">
                        <i class="fas fa-hands-helping"></i>
                        <span>Opportunities</span>
                    </a>
                </li>
                <li data-tooltip="Registrations">
                    <a href="{{ url('/admin/registrations') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Registrations</span>
                    </a>
                </li>
                <li data-tooltip="Volunteers">
                    <a href="{{ url('/admin/volunteers') }}">
                        <i class="fas fa-users"></i>
                        <span>Volunteers</span>
                    </a>
                </li>
                <li data-tooltip="Reports">
                    <a href="{{ url('/admin/reports') }}">
                        <i class="fas fa-chart-bar"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li data-tooltip="Settings">
                    <a href="{{ url('/admin/settings') }}">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="header">
            <div class="d-flex align-items-center">
                <button class="btn btn-sm btn-outline-secondary me-3 d-lg-none" id="mobileSidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="header-title">@yield('page-title', 'Dashboard')</h1>
            </div>
            <div class="user-profile">
                <span class="user-name">{{ auth()->user()->name }}</span>
                <img src="{{ auth()->user()->profile_photo_url ?? asset('images/default-profile.png') }}" 
                     alt="Profile" 
                     class="user-avatar">
                
                <div class="user-dropdown">
                    <a href="#">
                        <i class="fas fa-user"></i>
                        <span>My Profile</span>
                    </a>
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <span>Account Settings</span>
                    </a>
                    <div class="user-dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </form>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <main class="content">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                    @yield('breadcrumb')
                </ol>
            </nav>
            
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div>
                &copy; {{ date('Y') }} Civic Volunteering Platform. All rights reserved.
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle sidebar
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const mobileSidebarToggle = document.getElementById('mobileSidebarToggle');
        const mainContent = document.querySelector('.main-content');
        const footer = document.querySelector('.footer');
        
        // Toggle sidebar collapse
        function toggleSidebar() {
            sidebar.classList.toggle('collapsed');
            
            // Save state in localStorage
            const isCollapsed = sidebar.classList.contains('collapsed');
            localStorage.setItem('sidebarCollapsed', isCollapsed);
        }
        
        // Toggle mobile sidebar visibility
        function toggleMobileSidebar() {
            sidebar.classList.toggle('visible');
        }
        
        // Initialize sidebar state
        function initSidebar() {
            const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
            if (isCollapsed) {
                sidebar.classList.add('collapsed');
            }
            
            // Check screen size and adjust sidebar
            if (window.innerWidth < 992) {
                sidebar.classList.add('collapsed');
                sidebar.classList.remove('visible');
            }
        }
        
        // Event listeners
        sidebarToggle.addEventListener('click', toggleSidebar);
        mobileSidebarToggle.addEventListener('click', toggleMobileSidebar);
        
        // Close mobile sidebar when clicking outside
        document.addEventListener('click', function(e) {
            if (window.innerWidth < 992 && 
                !sidebar.contains(e.target) && 
                !mobileSidebarToggle.contains(e.target)) {
                sidebar.classList.remove('visible');
            }
        });
        
        // Initialize on load
        window.addEventListener('load', initSidebar);
        window.addEventListener('resize', initSidebar);
    </script>
    
    @stack('scripts')
</body>
</html>