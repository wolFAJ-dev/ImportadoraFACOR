<header>
        @if (Route::has('login'))
            <nav class="navbar bg-body-tertiary" style="display: flex; justify-content: space-between; align-items: center; padding: 10px; background-color: #f6e09a;">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Mi Logo" width="190" height="55px">
                    </a>
                </div>
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" style="margin-right: 10px;">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>