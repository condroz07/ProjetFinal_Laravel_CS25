<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.html"> <img src="img/logo.png" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown_1" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Shop
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="/product"> shop category</a>

                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="/blog" id="navbarDropdown_2" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    blog
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="/blog"> blog</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/contact">Contact</a>
                            </li>

                            @auth
                                @if (Auth::user()->role_id === 4)
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="/dashboard">Dashboard</a>
                                    </li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                    @if (Auth::user() == true)
                    @else
                        <div class="hearer_icon d-flex">
                            <a href="{{ route('login') }}"><i class="ti-user"></i></a>
                        </div>
                    @endif
                    @if (Auth::user() == null)
                    @else
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown d-flex align-items-center">
                                    <div>
                                        <img src="{{ asset('storage/user/' . Auth::user()->avatar) }}"
                                            class="rounded-fill" alt="" style="height: 6vh">
                                    </div>
                                    <a class="nav-link dropdown-toggle" href="/blog" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    @endif
                    @if (Auth::user() == null)
                    @else
                        <a href="/panier" class="position-relative">
                            <i class="fas fa-cart-plus"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger p-1 text-white">
                                {{ Auth::user()->panier->count() }}
                            </span>
                        </a>
                    @endif

                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->
