<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Portfolio')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="admin-shell">
        <aside class="sidebar">
            <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">Bilqis<span>Admin</span></a>
            <nav>
                <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                <a class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }}" href="{{ route('admin.profile.edit') }}"><i class="fa-solid fa-user-pen"></i> Profil Website</a>
                <a class="{{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}" href="{{ route('admin.portfolios.index') }}"><i class="fa-solid fa-briefcase"></i> Portfolio</a>
                <a class="{{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}" href="{{ route('admin.experiences.index') }}"><i class="fa-solid fa-calendar-check"></i> Pengalaman</a>
                <a class="{{ request()->routeIs('admin.skills.*') ? 'active' : '' }}" href="{{ route('admin.skills.index') }}"><i class="fa-solid fa-wand-magic-sparkles"></i> Skill</a>
                <a class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}"><i class="fa-solid fa-address-book"></i> Kontak</a>
                <a href="{{ route('home') }}" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i> Lihat Website</a>
            </nav>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="logout-button" type="submit"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
            </form>
        </aside>
        <main class="admin-main">
            <div class="admin-topbar">
                <div>
                    <p class="mb-1 text-muted">Halo, {{ auth()->user()->name }}</p>
                    <h1>@yield('page-title', 'Dashboard')</h1>
                </div>
                @yield('action')
            </div>
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    @include('partials.alert')
</body>
</html>
