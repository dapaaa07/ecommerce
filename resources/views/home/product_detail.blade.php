<!DOCTYPE html>
<html lang="en">

<head>

    @include('home.css')

</head>

<body>
    <!-- header section strats -->
    <header class="header_section">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{url('/dashboard')}}">
                <span>
                    Sopi
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/dashboard')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/shop') }}">
                            Shop
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="why.html">
                            Why Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="testimonial.html">
                            Testimonial
                        </a>
                    </li>
                    <li class="nav-item">
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

                        <x-dropdown-link :href="route('logout')" class="btn btn-danger" style="color: white;" onclick="event.preventDefault();
                                                this.closest('form').submit();">
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

    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="/products/{{$data->image}}" /></div>
                            <!-- <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
                            <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
                            <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
                            <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div> -->
                        </div>
                        <!-- <ul class="preview-thumbnail nav nav-tabs">
                            <li class="active"><img src="products/{{$data->image}}"></li>
                            <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                            <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                            <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                            <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                        </ul> -->

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{$data->title}}</h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">41 reviews</span>
                        </div>
                        <p class="product-description">{{$data->description}}</p>
                        <h5>Stok : {{$data->quantity}}</h5>
                        <h4 class="price">IDR <span>{{$data->price}}</span></h4>
                        <a href="{{ url('add_cart',$data->id) }}" class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </a>
                        <!-- <div class="action"> -->
                        <a class="btn btn-warning" href="{{ auth()->check() ? url('/shop#shop_section') : url('/#shop_section') }}">back</a>
                        <h1 class="mt-2" style="color: white;">@if(session('cart'))
                            <div class="flash-message btn btn-success ml-2">
                                {{ session('cart') }}
                            </div>
                            @elseif(session('delete'))
                            <div class="flash-message btn btn-danger icon- ml-2">
                                {{ session('delete') }}
                            </div>
                            @elseif(session('update'))
                            <div class="flash-message btn btn-info icon- ml-2">
                                {{ session('update') }}
                            </div>
                            @endif
                        </h1><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const flashMessage = document.querySelector('.flash-message');
        if (flashMessage) {
            setTimeout(() => {
                flashMessage.style.opacity = 0;
                setTimeout(() => flashMessage.remove(), 500); // Delay removal to allow fade-out
            }, 2200); // Hide after 3 seconds
        }
    });
</script>

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



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>