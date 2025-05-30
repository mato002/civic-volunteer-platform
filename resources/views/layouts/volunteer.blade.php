<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volunteer Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Update this if you're using another asset tool -->
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg min-h-screen">
            <div class="p-6 border-b">
                <h2 class="text-xl font-bold text-blue-600">Volunteer Panel</h2>
            </div>
            <nav class="p-4 space-y-2 text-gray-700">
                <a href="{{ route('volunteer.dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Dashboard</a>
                <a href="{{ route('opportunities.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Browse Opportunities</a>
                <a href="{{ route('volunteer.registrations') }}" class="block px-4 py-2 rounded hover:bg-blue-100">My Registrations</a>
                <a href="{{ route('volunteer.saved') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Saved Opportunities</a>
                <a href="{{ route('volunteer.profile') }}" class="block px-4 py-2 rounded hover:bg-blue-100">My Profile</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="w-full text-left px-4 py-2 rounded hover:bg-red-100 text-red-600">Logout</button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>
