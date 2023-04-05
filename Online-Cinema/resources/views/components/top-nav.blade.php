<!-- Responsive navbar-->

<style>
    .custom-navbar {
        z-index: 2000; /* Adjust this value to ensure it is higher than the sidebar's z-index */
        position: relative; /* You may need to set the position property for the z-index to take effect */
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="#!">Online Cinema</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('/home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('movie.search.page')}}" class="nav-link">Movie Search</a>
                </li>

                @if (Route::has('login'))
                    @auth
                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{url('/dashboard')}}">Dashboard</a>
                                    </li>

                                    <li><hr class="dropdown-divider" /></li>
                                    <li>
                                        <a href="{{ route('logout') }}" class="dropdown-item"
                                           onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                    </li>
                                </ul>
                            </li>
                        </ul>

                    @else
                        <li class="nav-item">
                            <a href="{{route('login') }}" class="nav-link">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>

</nav>
