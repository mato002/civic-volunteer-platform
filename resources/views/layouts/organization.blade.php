<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Organization Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Tailwind CSS via CDN (fallback if not using build system) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar-link.active {
            background-color: #f0fdf4;
            border-left: 4px solid #16a34a;
            color: #16a34a;
            font-weight: 500;
        }
        .sidebar-link:hover:not(.active) {
            background-color: #f8fafc;
        }
        .profile-dropdown {
            display: none;
        }
        .profile-container:hover .profile-dropdown {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen font-sans antialiased">

    <!-- Top Navigation Bar -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Left side - Logo/Branding -->
                <div class="flex items-center">
                    <span class="text-green-600 font-bold text-xl">OrganizersHub</span>
                </div>

                <!-- Right side - Profile & Actions -->
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <button class="p-1 rounded-full text-gray-500 hover:text-gray-700 focus:outline-none">
                        <i class="fas fa-bell"></i>
                        <span class="sr-only">Notifications</span>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative profile-container">
                        <button class="flex items-center space-x-2 focus:outline-none">
                            <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                <i class="fas fa-building"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-700">Org Name</span>
                            <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                        </button>

                        <div class="profile-dropdown absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                            <a href="{{ route('org.profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-cog mr-2"></i>Settings
                            </a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md min-h-[calc(100vh-4rem)] hidden md:block">
            <nav class="p-4 space-y-1 mt-4">
                <a href="{{ route('org.dashboard') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all">
                    <i class="fas fa-tachometer-alt mr-3 text-gray-500"></i>
                    Dashboard
                </a>
                <a href="{{ route('org.opportunities.create') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all">
                    <i class="fas fa-plus-circle mr-3 text-gray-500"></i>
                    Post Opportunities
                </a>
                <a href="{{ route('org.opportunities.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all">
                    <i class="fas fa-tasks mr-3 text-gray-500"></i>
                    Manage Opportunities
                </a>
                <a href="{{ route('org.registrations.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all">
                    <i class="fas fa-users mr-3 text-gray-500"></i>
                    View Registrations
                </a>
                    <a href="{{ route('org.settings.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg transition-all">
                    <i class="fas fa-users mr-3 text-gray-500"></i>
                    Settings
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="bg-white rounded-lg shadow-sm p-6">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t mt-8 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} VolunteerHub. All rights reserved.
        </div>
    </footer>

    <!-- Simple JavaScript for active link highlighting -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const links = document.querySelectorAll('.sidebar-link');
            
            links.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                    link.querySelector('i').classList.replace('text-gray-500', 'text-green-600');
                }
            });
        });
    </script>
</body>
</html>