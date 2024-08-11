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
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="{{ asset('admincss/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
                <div class="title">
                    <h1></h1>
                    <p></p>
                </div>
            </div>
            <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
            <ul class="list-unstyled">
                <li id="home"><a href="{{ url('admin/dashboard') }}"> <i class="icon-home"></i>Home </a></li>
                <li class="active" id="category"><a href="{{ url('view_category') }}"> <i class="icon-grid"></i>Category </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h1 style="color: white;">Update Product</h1>

                    <div class="div_deg mt-5">
                        <form action="{{ url('update_product',$product->id) }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="input_deg">
                                <label for="">Product Title</label>
                                <input type="text" name="title" value="{{$product->title}}">
                            </div>
                            <div class="input_deg">
                                <label for="">Description</label>
                                <textarea name="description" required>{{$product->description}}</textarea>
                            </div>
                            <div class="input_deg">
                                <label for="">Price</label>
                                <input value="{{$product->price}}" type="text" name="price">
                            </div>
                            <div class="input_deg">
                                <label for="">Quantity</label>
                                <input value="{{$product->quantity}}" type="number" name="quantity">
                            </div>
                            <div class="input_deg">
                                <label for="">Product Category</label>
                                <select name="category_id" required>
                                    <option value="">Pilih Product Category</option>
                                    @foreach($category as $cat)
                                    <option value="{{ $cat->category_name }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $cat->category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input_deg">
                                <label for="">Product image</label>
                                <input type="file" name="image">
                                <input class="btn btn-warning" style="color: black;" type="submit" value="Edit Product">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- javascript -->


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