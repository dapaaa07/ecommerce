        <!-- header section strats -->
        <header class="header_section">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.html">
                    <span>
                        Sopi
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""></span>
                </button>

                @php
                $currentRoute = Route::currentRouteName();
                @endphp


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  ">
                        <li class="nav-item {{ $currentRoute == 'dashboard' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/dashboard') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ $currentRoute == 'shop' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/shop') }}">Shop</a>
                        </li>
                        <li class="nav-item {{ $currentRoute == 'why' ? 'active' : '' }}">
                            <a class="nav-link" href="why.html">Why Us</a>
                        </li>
                        <li class="nav-item {{ $currentRoute == 'testimonial' ? 'active' : '' }}">
                            <a class="nav-link" href="testimonial.html">Testimonial</a>
                        </li>
                        <li class="nav-item {{ $currentRoute == 'contact' ? 'active' : '' }}">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
                    </ul>
                    <div class="user_option">
                        @if (Route::has('login'))

                        @auth
                        <a href="{{ url('mycart') }}" class="shopping-cart">
                            <i class="fa fa-shopping-bag" aria-hidden="true">
                                @if($cartCount > 0)
                                <span class="cart-count">{{ $cartCount }}</span>
                                @endif
                            </i>
                        </a>


                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="btn btn-danger" style="color: white;" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>


                        @else
                        <a href="{{ url('/login') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
                                Login
                            </span>
                        </a>
                        <a href="{{ url('/register') }}">
                            <i class="fa fa-vcard" aria-hidden="true"></i>
                            <span>
                                Register
                            </span>
                        </a>

                        @endauth
                        @endif


                    </div>
                </div>
            </nav>
        </header>
        <!-- end header section -->