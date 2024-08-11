<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        label {
            display: inline-block;
            width: 250px;
            font-size: 18px !important;
            color: white !important;
        }

        .input_deg {
            padding: 13px;
        }
    </style>
</head>

<body>

    <header class="header">
        @include('admin.header')
    </header>

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">

                    <h1 style="color: white;">Add Product @if(session('upload_product'))
                        <div class="flash-message btn btn-success ml-2">
                            {{ session('upload_product') }}
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
                    </h1>

                    <div class="div_deg mt-5">
                        <form action="{{ url('upload_product') }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="input_deg">
                                <label for="">Product Title</label>
                                <input type="text" name="title">
                            </div>
                            <div class="input_deg">
                                <label for="">Description</label>
                                <textarea name="description" required></textarea>
                            </div>
                            <div class="input_deg">
                                <label for="">Price</label>
                                <input type="text" name="price">
                            </div>
                            <div class="input_deg">
                                <label for="">Quantity</label>
                                <input type="number" name="quantity">
                            </div>
                            <div class="input_deg">
                                <label for="">Product Category</label>
                                <select name="category" required>
                                    <option value="">Pilih Product Category</option>
                                    @foreach($category as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input_deg">
                                <label for="">Product image</label>
                                <input type="file" name="image">
                                <input class="btn btn-success" type="submit" value="Add Product">
                            </div>
                        </form>
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
</body>

</html>