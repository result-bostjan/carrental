<div class="bg-dark text-white p-3" style="width: 240px; min-height: 100vh;">
    <h4 class="mb-4">Car Rental</h4>
    <ul class="nav flex-column">
        <li><a href="{{ url('/') }}" class="nav-link text-white">Home</a></li>
        @auth
            <li><a href="{{ url('/bookings') }}" class="nav-link text-white">My Bookings</a></li>
            @if(auth()->user()->is_admin)
                <li><a href="{{ url('/admin/cars') }}" class="nav-link text-white">Manage Cars</a></li>
            @endif
        @endauth
        @guest
            <li><a href="{{ route('login') }}" class="nav-link text-white">Login</a></li>
            <li><a href="{{ route('register') }}" class="nav-link text-white">Register</a></li>
        @endguest
    </ul>
</div>
