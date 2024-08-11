<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/fontawesome.min.css" integrity="sha512-B46MVOJpI6RBsdcU307elYeStF2JKT87SsHZfRSkjVi4/iZ3912zXi45X5/CBr/GbCyLx6M1GQtTKYRd52Jxgw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @include('admin.css')
    <style type="text/css">
        input[type='text'] {
            width: 334px;
            height: 40px;
        }

        input[type='submit'] {
            height: 50px;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
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
                    <h1 style="color: white;">Add Category @if(session('success'))
                        <div class="flash-message btn btn-success ml-2">
                            {{ session('success') }}
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
                    <div class="div_deg">
                        <form action="{{ url('add_category') }}" method="post">
                            @csrf

                            <div>
                                <input type="text" name="category">
                                <input class="btn btn-primary" type="submit" value="Add Category">
                            </div>
                        </form>
                    </div>

                    <div class="mt-5">
                        <table style="text-align: center;" class="table table_deg table-secondary table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 70px;" scope="col">No</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $index => $data)
                                <tr>
                                    <th style="text-align: center;" scope="row">{{$index +1}}</th>
                                    <td>{{$data->category_name}}</td>
                                    <td>{{$data->created_at->format('Y-m-d')}}</td>
                                    <td>
                                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_category',$data->id) }}">Delete</a>
                                        <a class="btn btn-info ml-2" href="{{ url('edit_category',$data->id) }}">Update</a>
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
                        danger: true,
                    })
                    .then((willCancel) => {
                        if (willCancel) {
                            window.location.href = urlToRedirect;
                        }
                    })

            }
        </script>

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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
        <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
        <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
        <script src="{{ asset('admincss/js/front.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>