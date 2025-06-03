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
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --dark-color: #2b2d42;
            --light-color: #f8f9fa;
            --success-color: #4cc9f0;
            --warning-color: #f8961e;
            --danger-color: #f72585;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: #f5f7fa;
            color: #4a4a4a;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            background: var(--dark-color);
            color: white;
            padding-top: 20px;
            transition: all 0.3s;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 100;
        }
        
        .sidebar-brand {
            padding: 0 20px 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-brand h4 {
            font-weight: 600;
            color: white;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .sidebar-brand .logo-icon {
            margin-right: 10px;
            color: var(--accent-color);
        }
        
        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-nav a {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 25px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.2s;
            border-left: 3px solid transparent;
            font-weight: 500;
        }
        
        .sidebar-nav a:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: white;
            border-left-color: var(--accent-color);
        }
        
        .sidebar-nav a.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: var(--primary-color);
        }
        
        .sidebar-nav i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }
        
        /* Main Content Styles */
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        /* Header Styles */
        .header {
            background: white;
            padding: 15px 30px;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
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
            padding: 5px 10px;
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
        }
        
        .profile-dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: white;
            min-width: 200px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            z-index: 1000;
            margin-top: 10px;
        }
        
        .profile-dropdown:hover .profile-dropdown-menu {
            display: block;
        }
        
        .dropdown-header {
            padding: 12px 16px;
            background-color: var(--light-color);
            font-weight: 600;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .dropdown-item {
            padding: 10px 16px;
            display: block;
            color: #555;
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: var(--primary-color);
        }
        
        .dropdown-divider {
            border-top: 1px solid #e0e0e0;
            margin: 5px 0;
        }
        
        /* Content Area */
        .content-area {
            padding: 30px;
            flex-grow: 1;
            background-color: #f5f7fa;
        }
        
        /* Footer Styles */
        .footer {
            background: white;
            text-align: center;
            padding: 15px;
            border-top: 1px solid #e0e0e0;
            color: #666;
            font-size: 0.9rem;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
                overflow: hidden;
            }
            
            .sidebar-brand h4 span {
                display: none;
            }
            
            .sidebar-nav a span {
                display: none;
            }
            
            .sidebar-nav i {
                margin-right: 0;
                font-size: 1.3rem;
            }
        }
        
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
                padding: 10px 0;
            }
            
            .sidebar-nav {
                display: flex;
                overflow-x: auto;
            }
            
            .sidebar-nav a {
                flex-direction: column;
                padding: 10px 15px;
                border-left: none;
                border-bottom: 3px solid transparent;
            }
            
            .sidebar-nav a:hover {
                border-left: none;
                border-bottom-color: var(--accent-color);
            }
            
            .sidebar-nav i {
                margin-right: 0;
                margin-bottom: 5px;
            }
            
            .content-area {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h4><i class="fas fa-hands-helping logo-icon"></i> <span>VolunteerHub</span></h4>
        </div>
        <ul class="sidebar-nav">
            <li>
                <a href="{{ route('volunteer.dashboard') }}" class="{{ request()->routeIs('volunteer.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('volunteer.opportunities.index') }}" class="{{ request()->routeIs('volunteer.opportunities.*') ? 'active' : '' }}">
                    <i class="fas fa-search"></i>
                    <span>Browse Opportunities</span>
                </a>
            </li>
            <li>
                <a href="{{ route('volunteer.registrations.index') }}" class="{{ request()->routeIs('volunteer.registrations.*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i>
                    <span>My Registrations</span>
                </a>
            </li>
            <li>
                <a href="{{ route('volunteer.feedback.index') }}" class="{{ request()->routeIs('volunteer.feedback.*') ? 'active' : '' }}">
                    <i class="fas fa-comment-alt"></i>
                    <span>My Reviews</span>
                </a>
            </li>
            <li>
                <a href="{{ route('volunteer.profile') }}" class="{{ request()->routeIs('volunteer.profile') ? 'active' : '' }}">
                    <i class="fas fa-user"></i>
                    <span>My Profile</span>
                </a>
            </li>
            <li>
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
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h1 class="header-title">@yield('title', 'Volunteer Dashboard')</h1>
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
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-cog mr-2"></i> Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                       onclick="event.preventDefault(); document.getElementById('logout-form-top').submit();">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
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

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Add active class to current route
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.sidebar-nav a');
            
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
            
            // Mobile menu toggle could be added here
        });
    </script>
</body>
</html>