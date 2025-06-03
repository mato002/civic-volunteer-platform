<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Dashboard') | Civic Volunteering</title>
    <!-- Bootstrap CSS -->
<!-- Bootstrap CSS -->
 <!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 260px;
            --header-height: 70px;
            --footer-height: 50px;
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --secondary-color: #f8fafc;
            --sidebar-text: rgba(255, 255, 255, 0.9);
            --sidebar-text-hover: #ffffff;
            --sidebar-bg-hover: rgba(255, 255, 255, 0.1);
            --content-bg: #f9fafb;
            --card-shadow: 0 1px 3px rgba(0, 0, 0, 0.05), 0 1px 2px rgba(0, 0, 0, 0.05);
            --transition-speed: 0.2s;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: var(--content-bg);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            color: #1f2937;
            line-height: 1.5;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--primary-color);
            color: var(--sidebar-text);
            position: fixed;
            height: 100vh;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            transition: all var(--transition-speed) ease;
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
        }
        
        .sidebar-brand .logo-text {
            transition: opacity var(--transition-speed) ease;
        }
        
        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding: 1rem 0;
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
            margin: 0 0.5rem;
            color: var(--sidebar-text);
            text-decoration: none;
            transition: all var(--transition-speed) ease;
            border-radius: 6px;
            font-size: 0.925rem;
            font-weight: 500;
        }
        
        .sidebar-nav li a:hover {
            background-color: var(--sidebar-bg-hover);
            color: var(--sidebar-text-hover);
        }
        
        .sidebar-nav li a i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 1rem;
        }
        
        .sidebar-nav li.active a {
            background-color: var(--sidebar-bg-hover);
            color: var(--sidebar-text-hover);
            font-weight: 600;
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
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e5e7eb;
        }
        
        .user-name {
            font-weight: 500;
            font-size: 0.925rem;
        }
        
        .user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            min-width: 200px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
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
            display: block;
            padding: 0.75rem 1.25rem;
            color: #4b5563;
            text-decoration: none;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }
        
        .user-dropdown a:hover {
            background-color: #f9fafb;
            color: #111827;
        }
        
        .user-dropdown a i {
            margin-right: 8px;
            width: 18px;
            text-align: center;
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
        
        /* Card Styles */
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: var(--card-shadow);
            margin-bottom: 1.5rem;
            border: none;
        }
        
        .card-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            font-weight: 600;
            background-color: transparent;
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
        
        .breadcrumb-item a {
            color: #4b5563;
            text-decoration: none;
            font-size: 0.875rem;
        }
        
        .breadcrumb-item.active {
            color: #6b7280;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
                overflow: hidden;
            }
            
            .sidebar-brand .logo-text {
                opacity: 0;
                width: 0;
                height: 0;
                overflow: hidden;
            }
            
            .sidebar-brand {
                justify-content: center;
                padding: 1.5rem 0.5rem;
            }
            
            .sidebar-nav li a span {
                opacity: 0;
                width: 0;
                height: 0;
                overflow: hidden;
                display: inline-block;
            }
            
            .sidebar-nav li a {
                justify-content: center;
                padding: 0.75rem;
                margin: 0 0.25rem;
            }
            
            .sidebar-nav li a i {
                margin-right: 0;
                font-size: 1.1rem;
            }
            
            .main-content {
                margin-left: 80px;
            }
            
            .footer {
                width: calc(100% - 80px);
                margin-left: 80px;
            }
            
            .user-name {
                display: none;
            }
        }
        
        @media (max-width: 576px) {
            .content {
                padding: 1rem;
            }
            
            .card-header, .card-body {
                padding: 1rem;
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
    </style>
</head>
<body>
    <!-- Fixed Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <span class="logo-text">Civic Volunteering</span>
            <i class="fas fa-bars"></i>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li class="active">
                    <a href="{{ url('/admin/dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/organizations') }}">
                        <i class="fas fa-building"></i>
                        <span>Organizations</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/opportunities') }}">
                        <i class="fas fa-hands-helping"></i>
                        <span>Opportunities</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/registrations') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Registrations</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/volunteers') }}">
                        <i class="fas fa-users"></i>
                        <span>Volunteers</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/admin/reports') }}">
                        <i class="fas fa-chart-bar"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li>
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
        <!-- Fixed Header -->
        <header class="header">
            <h1 class="header-title">@yield('page-title', 'Dashboard')</h1>
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

        <!-- Fixed Footer -->
        <footer class="footer">
            <div>
                &copy; {{ date('Y') }} Civic Volunteering Platform. All rights reserved.
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle sidebar on mobile
        document.querySelector('.sidebar-brand i').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            const footer = document.querySelector('.footer');
            
            if (sidebar.style.width === '260px') {
                sidebar.style.width = '80px';
                mainContent.style.marginLeft = '80px';
                footer.style.width = 'calc(100% - 80px)';
                footer.style.marginLeft = '80px';
                document.querySelectorAll('.sidebar-nav li a span').forEach(el => {
                    el.style.opacity = '0';
                    el.style.width = '0';
                    el.style.height = '0';
                    el.style.overflow = 'hidden';
                });
                document.querySelector('.sidebar-brand .logo-text').style.opacity = '0';
            } else {
                sidebar.style.width = '260px';
                mainContent.style.marginLeft = '260px';
                footer.style.width = 'calc(100% - 260px)';
                footer.style.marginLeft = '260px';
                document.querySelectorAll('.sidebar-nav li a span').forEach(el => {
                    el.style.opacity = '1';
                    el.style.width = 'auto';
                    el.style.height = 'auto';
                    el.style.overflow = 'visible';
                });
                document.querySelector('.sidebar-brand .logo-text').style.opacity = '1';
            }
        });
    </script>
</body>
</html>