<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Org Panel - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="d-flex">
        {{-- Sidebar --}}
        <div class="bg-dark text-white p-3" style="min-width: 250px;">
            <h4>📌 Org Panel</h4>
            <ul class="nav flex-column mt-4">
                <li class="nav-item"><a href="{{ route('org.dashboard') }}" class="nav-link text-white">🏠 Dashboard</a></li>
                <li class="nav-item"><a href="{{ route('org.opportunities.create') }}" class="nav-link text-white">📝 Post Opportunity</a></li>
                <li class="nav-item"><a href="{{ route('org.opportunities.index') }}" class="nav-link text-white">📂 Manage Opportunities</a></li>
                <li class="nav-item"><a href="{{ route('org.registrations.index') }}" class="nav-link text-white">👥 Registrations</a></li>
                <li class="nav-item"><a href="{{ route('org.profile.edit') }}" class="nav-link text-white">👤 Org Profile</a></li>
                <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link text-white">🚪 Logout</a></li>
            </ul>
        </div>

        {{-- Main Content --}}
        <div class="flex-fill p-4">
            <header class="mb-4 border-bottom pb-2">
                <h2>@yield('title')</h2>
            </header>

            <main>
                @yield('content')
            </main>

            <footer class="mt-5 pt-3 border-top">
                <p class="text-muted">&copy; {{ now()->year }} Civic Volunteering Org Panel</p>
            </footer>
        </div>
    </div>
</body>
</html>
