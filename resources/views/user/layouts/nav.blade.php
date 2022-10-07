<link rel="stylesheet" href="/css/stylesheet.css">
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="nav-link active " href="#">Free Shipping on All Order over $75!</a>
        <ul class="navbar-nav  mb-lg-0">

            @auth
                <li class="nav-item ml-5">
                    <a class="nav-link" href="{{ route('user.myaccount', Auth::user()->id) }}"><i class="fa fa-user"
                            aria-hidden="true"></i>
                        {{ Auth::user()->name }}
                    </a>
                </li>

            <li class="nav-item row" style="width: 160px; margin-left: 30px">
                <a class="nav-link active notification" href="{{ url('home/favorite') }}"><i class="fa fa-heart"
                    aria-hidden="true"></i>Wishlist

                        <span class="badge">{{ count(auth()->user()->products()->where('fav', '=', true)->get()) }}</span>
                </a>
            </li>

            <div class="dropdown " style="margin: 0 10px 0 30px ">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                    Currency
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>

            <li class="nav-item row" style="width: 160px; margin-left: 30px">
                <a class="nav-link active notification" href="{{ url('home/cart') }}"><svg
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 512" width="30px" hight="30px">
                        <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M24 0C10.7 0 0 10.7 0 24S10.7 48 24 48H76.1l60.3 316.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24-10.7 24-24s-10.7-24-24-24H179.9l-9.1-48h317c14.3 0 26.9-9.5 30.8-23.3l54-192C578.3 52.3 563 32 541.8 32H122l-2.4-12.5C117.4 8.2 107.5 0 96 0H24zM176 512c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48zm336-48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48z" />
                    </svg>My Cart

                        <span class="badge">{{ count(auth()->user()->products()->where('cart', '=', true)->get()) }}</span>
                </a>
            </li>
            @endauth

            @guest

                <li class="nav-item" style="margin-left: 30px">

                    <a class="btn btn-primary"href="{{ url('/login') }}">Login</a>

                </li>
            @endguest

            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-inline-block">
                            @csrf
                            <button class="btn btn-sm btn-outline p-0" type="submit">
                                <span data-feather="log-out"></span>
                                Sign Out
                            </button>
                        </form>
                    </a>
                </li>
            @endauth

            @auth

                @if (Auth::user()->role == 'moderator' || Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin') }}">
                            <form id="logout-form" action="{{ url('admin') }}" method="GET" class="d-inline-block">
                                @csrf
                                <button class="btn btn-sm btn-outline p-0" type="submit">
                                    <span data-feather="log-out"></span>
                                    Admin Dashboard
                                </button>
                            </form>
                        </a>
                    </li>
                @endif

            @endauth



        </ul>
    </div>
</nav>

<section class="w-100 d-flex justify-content-center" style="margin: 25px 0px 25px">
    <form class="d-flex" role="search" type="get" action="{{ url('/search') }}">
        <input class="form-control me-2" style="width: 400px;" type="search" placeholder="Search" aria-label="Search"
            name="query">
        <button class="btn btn-primary" type="submit">Search</button>
    </form>
</section>

<nav class="navbar navbar-expand-lg bg-dark p-3 ">
    <div class="container">
        <h1 class="text-white " style="margin: 0 100px 0 0px; padding: 0 150px 0 0">Fashion</h1>
        <ul class="navbar-nav  mb-lg-0 text-white "style="margin: 0 0px 0 100px;">

            <li class="nav-item ml-5">
                <a class="nav-link text-white" id="nav-text-item" href="{{ url('home') }}">Home</a>
            </li>
            <li class="nav-item" id="nav-text-item">
                <a class="nav-link active text-white" href="#">Women</a>
            </li>
            <li class="nav-item" id="nav-text-item">
                <a class="nav-link active text-white" href="#">Men</a>
            </li>
            <li class="nav-item" id="nav-text-item">
                <a class="nav-link active text-white" href="#">Footwear</a>
            </li>
            <li class="nav-item" id="nav-text-item">
                <a class="nav-link active text-white" href="#">Accessories</a>
            </li>
            <li class="nav-item" id="nav-text-item">
                <a class="nav-link active text-white" href="#">Sales</a>
            </li>
            <li class="nav-item" id="nav-text-item">
                <a class="nav-link active text-white" href="#">Blog</a>
            </li>
        </ul>
    </div>
</nav>
