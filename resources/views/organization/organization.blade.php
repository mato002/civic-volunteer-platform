<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Organization Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white h-screen shadow-md p-5 fixed">
        <h2 class="text-2xl font-bold text-blue-600 mb-6">Org Dashboard</h2>
        <nav class="flex flex-col space-y-4">
            <a href="{{ url('/org/dashboard') }}" class="text-gray-700 hover:text-blue-600">📊 Dashboard</a>
            <a href="{{ url('/org/opportunities/create') }}" class="text-gray-700 hover:text-blue-600">📝 Post Opportunities</a>
            <a href="{{ url('/org/opportunities') }}" class="text-gray-700 hover:text-blue-600">📂 Manage Opportunities</a>
            <a href="{{ url('/org/registrations') }}" class="text-gray-700 hover:text-blue-600">👥 View Registrations</a>
            <a href="{{ url('/org/profile') }}" class="text-gray-700 hover:text-blue-600">🏷️ Org Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-600 hover:underline">🚪 Logout</button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 p-8 w-full">
        @yield('content')
    </main>

</body>
</html>
