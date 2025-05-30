<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Dashboard') | Civic Volunteering</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 250px;
            --header-height: 70px;
            --footer-height: 60px;
            --primary-color: #1e40af;
            --primary-hover: #1e3a8a;
            --secondary-color: #f8fafc;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            color: #374151;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--primary-color);
            color: white;
            position: fixed;
            height: 100vh;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }
        
        .sidebar-brand {
            padding: 1.5rem;
            font-size: 1.25rem;
            font-weight: 600;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
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
            padding: 0.75rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .sidebar-nav li a:hover {
            background-color: var(--primary-hover);
            color: white;
        }
        
        .sidebar-nav li a i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }
        
        .sidebar-nav li.active a {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        /* Header Styles */
        .header {
            height: var(--header-height);
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }
        
        .header-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #111827;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
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
        }
        
        /* Content Styles */
        .content {
            flex: 1;
            padding: 2rem;
            background-color: #f3f4f6;
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
        }
        
        /* Card Styles */
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            font-weight: 600;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                overflow: hidden;
            }
            
            .sidebar-brand, .sidebar-nav li a span {
                display: none;
            }
            
            .sidebar-nav li a {
                justify-content: center;
                padding: 0.75rem;
            }
            
            .sidebar-nav li a i {
                margin-right: 0;
                font-size: 1.25rem;
            }
            
            .main-content {
                margin-left: 70px;
            }
            
            .footer {
                width: calc(100% - 70px);
                margin-left: 70px;
            }
        }
    </style>
</head>
<body>
    <!-- Fixed Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            Civic Volunteering
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li>
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
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="w-full text-left">
                            <a href="#" class="text-red-400 hover:text-red-300">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                        </button>
                    </form>
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
            </div>
        </header>

        <!-- Content Area -->
        <main class="content">
            @yield('content')
        </main>

        <!-- Fixed Footer -->
        <footer class="footer">
            <div class="text-sm text-gray-600">
                &copy; {{ date('Y') }} Civic Volunteering Platform. All rights reserved.
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>