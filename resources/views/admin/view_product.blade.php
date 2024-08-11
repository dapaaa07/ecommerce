<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
</head>

<body>

    <header class="header">
        @include('admin.header')
    </header>

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="{{ asset('admincss/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
                <div class="title">
                    <h2>{{ Auth::user()->name }}</h2>
                    <p>{{ Auth::user()->email }}</p>
                </div>
            </div>
            <!-- Sidebar Navidation Menus-->
            <span class="heading">Main</span>
            <ul class="list-unstyled">
                <li id="home"><a href="{{ url('admin/dashboard') }}"> <i class="icon-home"></i>Home </a></li>
                <li id="category"><a href="{{ url('view_category') }}"> <i class="icon-grid"></i>Category </a></li>
                <li id="category"><a href="{{ url('orders') }}"> <i class="icon-grid"></i>Orders </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows active"></i>Products </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="{{ url('add_product') }}">Add Product</a></li>
                        <li class="active"><a href="{{ url('view_product') }}">View Products</a></li>
                        <li><a href="#">Page</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h1 style="color: white;">@if(session('upload_product'))
                        <div class="flash-message btn btn-success ml-2">
                            {{ session('upload_product') }}
                        </div>
                        @elseif(session('delete_product'))
                        <div class="flash-message btn btn-danger icon- ml-2">
                            {{ session('delete_product') }}
                        </div>
                        @elseif(session('update_product'))
                        <div class="flash-message btn btn-info icon- ml-2">
                            {{ session('update_product') }}
                        </div>
                        @endif
                    </h1>


                    <form action="{{ url('product_search') }}" method="get">
                        <input type="search" name="search">
                        <input type="submit" class="btn btn-warning" style="color: black;" value="Search">
                    </form>

                    <div class="mt-5">
                        <table style="text-align: center;" class="table table_deg table-dark table-striped table-bordered">
                            <thead class="table-secondary" style="color: black;">
                                <tr>
                                    <th style="width: 46px;" scope="col">No</th>
                                    <th scope="col">Product Title</th>
                                    <th scope="col">Descriptions</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $index => $product)
                                <tr>
                                    <th style="text-align: center;" scope="row">{{$index +1}}</th>
                                    <td>{{$product->title}}</td>
                                    <td>{!!Str::limit($product->description,90)!!}</td>
                                    <td>{{$product->category}}</td>
                                    <td>{{$product->price}}K</td>
                                    <td>{{$product->quantity}}</td>
                                    <td><img style="width: 75px; height:auto;" src="products/{{$product->image}}" alt=""></td>
                                    <td>
                                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_product',$product->id) }}">Delete</a>
                                        <a class="btn btn-info mt-3" href="{{ url('edit_product',$product->id) }}">Update</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <!-- javascript -->
        <script>
            // Dapatkan URL saat ini
            const currentURL = window.location.href;

            // Dapatkan semua elemen <li>
            const navItems = document.querySelectorAll('ul li');

            // Loop melalui semua elemen <li>
            navItems.forEach(item => {
                const link = item.querySelector('a');
                if (link && currentURL.includes(link.getAttribute('href'))) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        </script>
        <script type="text/javascript">
            function confirmation(ev) {
                ev.preventDefault();
                var urlToRedirect = ev.currentTarget.getAttribute('href');
                console.log(urlToRedirect);

                swal({
                        title: "Apakah anda yakin ingin menghapusnya?",
                        text: "Data ini akan terhapus selamanya.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = urlToRedirect;
                        }
                    });
            }
        </script>

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

        <!-- JavaScript files-->
        <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
        <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
        <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
        <script src="{{ asset('admincss/js/front.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>