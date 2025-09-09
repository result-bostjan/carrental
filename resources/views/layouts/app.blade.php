<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Car Rental')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
</head>
<body>
    <div class="d-flex">
        {{-- Sidebar --}}
        @include('partials.sidebar')

        {{-- Main content --}}
        <main class="flex-grow-1 p-4">
            <h1 class="mb-4">@yield('title')</h1>
            @yield('content')
        </main>
    </div>

    {{-- DashUI JS --}}
    <script src="{{ asset('assets/js/feather.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarMenu.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
