<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volunteer Dashboard | VolunteerHub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-hover: #3a56d4;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --dark-color: #2b2d42;
            --light-color: #f8f9fa;
            --success-color: #4cc9f0;
            --warning-color: #f8961e;
            --danger-color: #f72585;
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 80px;
            --header-height: 70px;
            --transition-speed: 0.3s;
            --border-radius: 8px;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: #4a4a4a;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        
        /* App Layout */
        .app-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--dark-color) 0%, #1a1c2e 100%);
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: all var(--transition-speed) ease;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }
        
        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }
        
        .sidebar-brand {
            padding: 1.5rem 1.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            min-height: var(--header-height);
        }
        
        .sidebar-brand h4 {
            font-weight: 600;
            color: white;
            margin: 0;
            display: flex;
            align-items: center;
            white-space: nowrap;
        }
        
        .sidebar-brand .logo-icon {
            margin-right: 12px;
            color: var(--accent-color);
            font-size: 1.5rem;
        }
        
        .sidebar-toggle {
            cursor: pointer;
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.7);
            transition: all var(--transition-speed) ease;
        }
        
        .sidebar-toggle:hover {
            color: white;
        }
        
        .sidebar.collapsed .sidebar-toggle {
            transform: rotate(180deg);
        }
        
        .sidebar-nav {
            list-style: none;
            padding: 1rem 0;
            margin: 0;
        }
        
        .sidebar-nav a {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1.5rem;
            margin: 0.25rem 0.75rem;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all var(--transition-speed) ease;
            border-radius: var(--border-radius);
            font-weight: 500;
            white-space: nowrap;
        }
        
        .sidebar-nav a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(3px);
        }
        
        .sidebar-nav a.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
            box-shadow: inset 3px 0 0 var(--accent-color);
        }
        
        .sidebar-nav i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }
        
        /* Collapsed sidebar styles */
        .sidebar.collapsed .sidebar-brand h4 span {
            display: none;
        }
        
        .sidebar.collapsed .sidebar-nav a {
            justify-content: center;
            padding: 0.75rem;
            margin: 0.25rem;
        }
        
        .sidebar.collapsed .sidebar-nav i {
            margin-right: 0;
            font-size: 1.3rem;
        }
        
        .sidebar.collapsed .sidebar-nav a span {
            display: none;
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
            background-color: var(--dark-color);
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
            background: white;
            padding: 0 1.5rem;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-title {
            font-weight: 600;
            color: var(--dark-color);
            margin: 0;
            font-size: 1.25rem;
        }
        
        /* Profile Dropdown */
        .profile-dropdown {
            position: relative;
        }
        
        .profile-toggle {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 0.5rem 0.75rem;
            border-radius: 50px;
            transition: all 0.2s;
        }
        
        .profile-toggle:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }
        
        .profile-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .profile-name {
            font-weight: 500;
            margin-right: 8px;
            transition: all var(--transition-speed) ease;
        }
        
        .sidebar.collapsed ~ .main-content .profile-name {
            display: none;
        }
        
        .profile-dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: calc(100% + 5px);
            background-color: white;
            min-width: 200px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: var(--border-radius);
            overflow: hidden;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.2s ease;
        }
        
        .profile-dropdown:hover .profile-dropdown-menu {
            display: block;
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .dropdown-header {
            padding: 0.75rem 1rem;
            background-color: var(--light-color);
            font-weight: 600;
            font-size: 0.875rem;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .dropdown-item {
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            color: #555;
            text-decoration: none;
            transition: all 0.2s;
            font-size: 0.875rem;
        }
        
        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: var(--primary-color);
        }
        
        .dropdown-item i {
            margin-right: 10px;
            width: 18px;
            text-align: center;
        }
        
        .dropdown-divider {
            border-top: 1px solid #e0e0e0;
            margin: 0.25rem 0;
        }
        
        /* Content Area */
        .content-area {
            padding: 1.5rem;
            flex-grow: 1;
            background-color: #f5f7fa;
        }
        
        /* Footer Styles */
        .footer {
            background: white;
            text-align: center;
            padding: 1rem;
            border-top: 1px solid #e0e0e0;
            color: #666;
            font-size: 0.875rem;
        }
        
        /* Cards */
        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
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
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 1100;
            }
            
            .sidebar.visible {
                transform: translateX(0);
            }
            
            .mobile-menu-toggle {
                display: block !important;
            }
            
            .main-content {
                margin-left: 0 !important;
            }
            
            .profile-name {
                display: none;
            }
        }
        
        @media (max-width: 768px) {
            .content-area {
                padding: 1rem;
            }
            
            .header {
                padding: 0 1rem;
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
    </style>
</head>
<body>
    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <h4><i class="fas fa-hands-helping logo-icon"></i> <span>VolunteerHub</span></h4>
                <i class="fas fa-chevron-left sidebar-toggle" id="sidebarToggle"></i>
            </div>
            <ul class="sidebar-nav">
                <li data-tooltip="Dashboard">
                    <a href="{{ route('volunteer.dashboard') }}" class="{{ request()->routeIs('volunteer.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li data-tooltip="Browse Opportunities">
                    <a href="{{ route('volunteer.opportunities.index') }}" class="{{ request()->routeIs('volunteer.opportunities.*') ? 'active' : '' }}">
                        <i class="fas fa-search"></i>
                        <span>Browse Opportunities</span>
                    </a>
                </li>
                <li data-tooltip="My Registrations">
                    <a href="{{ route('volunteer.registrations.index') }}" class="{{ request()->routeIs('volunteer.registrations.*') ? 'active' : '' }}">
                        <i class="fas fa-calendar-check"></i>
                        <span>My Registrations</span>
                    </a>
                </li>
                <li data-tooltip="My Reviews">
                    <a href="{{ route('volunteer.feedback.index') }}" class="{{ request()->routeIs('volunteer.feedback.*') ? 'active' : '' }}">
                        <i class="fas fa-comment-alt"></i>
                        <span>My Reviews</span>
                    </a>
                </li>
                <li data-tooltip="My Profile">
                    <a href="{{ route('volunteer.profile') }}" class="{{ request()->routeIs('volunteer.profile') ? 'active' : '' }}">
                        <i class="fas fa-user"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li data-tooltip="Logout">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <div class="d-flex align-items-center">
                    <button class="btn btn-sm btn-outline-secondary me-3 d-lg-none mobile-menu-toggle" id="mobileSidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="header-title">@yield('title', 'Volunteer Dashboard')</h1>
                </div>
                <div class="profile-dropdown">
                    <div class="profile-toggle">
                        <div class="profile-avatar">
                            {{ strtoupper(substr(Auth::guard('volunteer')->user()->name, 0, 1)) }}
                        </div>
                        <span class="profile-name">{{ Auth::guard('volunteer')->user()->name }}</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="profile-dropdown-menu">
                        <div class="dropdown-header">My Account</div>
                        <a href="{{ route('volunteer.profile') }}" class="dropdown-item">
                            <i class="fas fa-user"></i> Profile
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault(); document.getElementById('logout-form-top').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form-top" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="content-area">
                @yield('content')
            </div>

            <!-- Footer -->
            <div class="footer">
                &copy; {{ date('Y') }} VolunteerHub. All rights reserved.
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Toggle sidebar
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const mobileSidebarToggle = document.getElementById('mobileSidebarToggle');
        
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
        
        // Add active class to current route
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.sidebar-nav a');
            
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>