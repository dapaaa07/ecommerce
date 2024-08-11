<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
    <div class="hero_area">

        <!-- header section start -->
        @include('home.header')
        <!-- header section end -->

        <!-- slider section -->

        @include('home.slider')

        <!-- end slider section -->
    </div>
    <!-- end hero area -->

    <!-- shop section -->

    @include('home.product')

    <!-- end shop section -->







    <!-- contact section -->

    @include('home.contact')

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


</body>

</html>