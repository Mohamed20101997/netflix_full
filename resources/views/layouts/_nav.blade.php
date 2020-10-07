<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">

        <a href="{{ route('welcome')}}" class="navbar-brand">Netflix <span class="text-primary font-weight-bold">ify</span></a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">

            <form action="" class="col-12 col-md-6 p-0 mt-1">
                <div class="input-group">
                    <input type="search" class="form-control bg-transparent border-0" name="search" placeholder="Search for your favorite movies" aria-label="Search for your favorite movies">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent border-0 text-white"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </form>

            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="navbar-nav ml-auto">
                        <a href="" class="nav-link text-white mr-2" style="position: relative">
                            <i class="fa fa-heart"></i>
                            <span class="bg-primary text-white d-flex justify-content-center align-items-center"
                            style="position:absolute;top: 0; right: -15px; width: 30px; height: 20px; border-radius: 50px"
                            id="nav__fav-count"
                            data-fav-count="{{ auth()->user()->movies_count }}"
                            >

                                    {{ auth()->user()->movies_count > 9 ? '9+' : auth()->user()->movies_count }}
                            </span>
                        </a>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                            {{ auth()->user()->name}}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if(auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('admin') )

                                <a class="dropdown-item" target=”_blank” href="{{ route('dashboard.welcome') }}">
                                    <i class="fa fa-tachometer-alt fa-sm"></i>
                                    Dashboard
                                </a> {{-- end of dashboard link--}}
                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt fa-sm"></i>
                                Logout
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </a>{{-- end of logout link--}}

                        </div>
                    </li>

                    </li>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary mb-2 mb-md-0 mr-0 mr-md-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
                @endauth
            </ul>

        </div>  <!-- end of collapse-->

    </div> <!-- end of container-->

</nav> <!-- end of nav-->
