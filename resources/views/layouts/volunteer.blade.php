<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volunteer Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap or Tailwind (You can choose one) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #343a40;
            color: #fff;
            padding-top: 20px;
        }
        .sidebar a {
            color: #fff;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .header {
            background: #f8f9fa;
            padding: 10px 20px;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .footer {
            background: #f1f1f1;
            text-align: center;
            padding: 10px;
            margin-top: auto;
        }
        .profile-dropdown {
            position: relative;
            display: inline-block;
        }
        .profile-dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            background-color: #fff;
            min-width: 150px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            z-index: 1;
        }
        .profile-dropdown-menu a {
            padding: 10px 15px;
            display: block;
            color: #333;
            text-decoration: none;
        }
        .profile-dropdown-menu a:hover {
            background-color: #f0f0f0;
        }
        .profile-dropdown:hover .profile-dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center mb-4">Volunteer</h4>
        <a href="{{ route('volunteer.dashboard') }}">Dashboard</a>
        <a href="{{ route('volunteer.opportunities.index') }}">Browse Opportunities</a>
        <a href="{{ route('volunteer.registrations.index') }}">My Registrations</a>
        <a href="{{ route('volunteer.feedback.index') }}">My Reviews & Feedback</a>
        <a href="{{ route('volunteer.profile') }}">My Profile</a>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div><strong>Civic Volunteering Dashboard</strong></div>
            <div class="profile-dropdown">
                <span style="cursor: pointer;">👤 {{ Auth::guard('volunteer')->user()->name }}</span>
                <div class="profile-dropdown-menu">
                    <a href="{{ route('volunteer.profile') }}">My Profile</a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form-top').submit();">
                        Logout
                    </a>
                    <form id="logout-form-top" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="p-4">
            @yield('content')
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} Civic Volunteering Platform
        </div>
    </div>

</body>
</html>
