<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <!-- Add Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section start -->
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
                $currentUrl = url()->current();
                @endphp


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  ">
                        <li class="nav-item {{ $currentUrl == url('/dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item {{ $currentUrl == url('/shop') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/shop') }}">Shop</a>
                        </li>
                        <li class="nav-item {{ $currentUrl == url('/why_us') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('why_us') }}">Why us</a>
                        </li>
                        <li class="nav-item {{ $currentUrl == url('/testimonial') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/testimonial') }}">Testimonial</a>
                        </li>
                        <li class="nav-item {{ $currentUrl == url('/contact_us') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/contact_us') }}">contact us</a>
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
        <!-- header section end -->

        <!-- slider section -->


        <!-- end slider section -->
    </div>
    <!-- end hero area -->

    <!-- shop section -->

    <!-- shop section -->
    <!-- shop section -->
    <section id="shop_section" class="shop_section layout_padding">
        <div class="container">
            <!-- Category Filter -->
            <!-- Category Filter -->
            <div class="filter_section mb-4">
                <form method="GET" action="{{ url('/shop') }}">
                    <label for="category" class="filter-label">Filter by Category:</label>
                    <select name="category" id="category" class="select2" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                        @endforeach
                    </select>
                </form>
            </div>


            <!-- Products -->
            <div class="row">
                @foreach($product as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <a href="{{ url('product_detail', $product->id) }}">
                            <div class="img-box">
                                <img src="products/{{ $product->image }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h6>{!! Str::limit($product->title, 27) !!}</h6>
                                <div class="ml-2">
                                    <h6>Price IDR
                                        <span>{{ $product->price }}K</span>
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end shop section -->

    <!-- end shop section -->


    <!-- end shop section -->







    <!-- contact section -->


    <!-- end contact section -->



    <!-- info section -->

    @include('home.footer')

    <!-- end info section -->


    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('navbar');
            const navItems = navbar.querySelectorAll('.nav-item');
            const currentUrl = window.location.href; // Mendapatkan URL saat ini

            navItems.forEach(function(item) {
                const itemUrl = item.getAttribute('data-url');
                if (currentUrl.includes(itemUrl)) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select a category",
                allowClear: true
            });
        });
    </script>



</body>

</html>