<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('webassets/imgs/logo.png') }}"
                class="logo" style="width:150px" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> <i class="fa-solid fa-bars mr-3"></i>
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About US</a></li>
                <li class="nav-item"><a href="{{ url('/how-use') }}" class="nav-link">How To Use</a></li>
                <li class="nav-item"><a href="{{ url('/partners') }}" class="nav-link">Partners</a></li>
                <li class="nav-item"><a href="{{ url('/terms-conditions') }}" class="nav-link">Terms of
                        Use</a></li>
                <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Contact US</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user mr-2"></i>

                        @if (Auth::user())
                            {{ Auth::user()->name ?? 'User' }}
                        @else
                            User
                        @endif

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        @if (Auth::user())
                            <a class="dropdown-item" href="{{ route('user-logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                > <i class="fa fa-user mr-2"></i> Logout </a>
                            <form id="logout-form" action="{{ route('user-logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        @else
                            <a class="dropdown-item" href="{{ url('/user-login') }}"><i class="fa fa-user mr-2"></i>
                                Login / Register </a>
                        @endif

                        <a class="dropdown-item"
                        @if (Auth::user())
                        href="{{ url('/my-cart') }}"
                        @else
                       href="{{ url('/user-login') }}"

                    @endif
                        ><i class="fa-solid fa-cart-shopping mr-2"></i> My
                            Cart</a>
                        <a class="dropdown-item"

                        @if (Auth::user())

                        href="{{ route('my-items.index') }}"
                        @else
                       href="{{ url('/user-login') }}"

                    @endif><i class="fa-solid fa-list-ul mr-2"></i> My
                            Items</a>
                        <a class="dropdown-item"
                        @if (Auth::user())
                        href="{{ url('/my-orders') }}"
                        @else
                       href="{{ url('/user-login') }}"

                    @endif
                        ><i class="fa-solid fa-clipboard-list mr-2"></i>
                            My Orders</a>
                        <a class="dropdown-item"
                        @if (Auth::user())
                        href="{{ url('/my-points') }}"
                        @else
                       href="{{ url('/user-login') }}"

                    @endif ><i class="fa-solid fa-coins mr-2"></i> My
                            Points</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
