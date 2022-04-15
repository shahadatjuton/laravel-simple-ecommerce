<div class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">Simple-Ecommerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarSupportedContent">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{route('home')}}">Home</a>
                    </li>

                    @guest()
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{route('register')}}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{route('login')}}">Login</a>
                    </li>
                    @endguest
                    @auth()
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route(Auth::user()->role->id==1?'admin.dashboard':'customer.dashboard')}}">Dashboard</a></li>
                            <li>
                                <a class="dropdown-item " href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                    <a class="nav-link active" aria-current="page" href="{{route('logout')}}">Log Out</a>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</div>
