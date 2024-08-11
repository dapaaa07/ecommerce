<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .table-container {
            overflow-x: auto;
            /* Menambahkan scroll horizontal jika tabel terlalu lebar */
            width: 100%;
            /* Memastikan container mengambil lebar penuh dari elemen induknya */
        }

        .table {
            min-width: 1000px;
            /* Atur lebar minimum tabel jika diperlukan */
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
                    <div class="mt-5">
                        <!-- Container untuk tabel -->
                        <div class="table-container">
                            <table class="table table_deg table-dark table-striped table-bordered">
                                <thead class="table-secondary" style="color: black;">
                                    <tr>
                                        <th style="width: 46px;" scope="col">No</th>
                                        <th scope="col">Product Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Status</th>
                                        <th style="text-align: center;" scope="col">Change Status</th>
                                        <th scope="col">Print</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <th style="text-align: center;" scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $order->title }}</td>
                                        <td>
                                            <img src="{{ asset('products/' . $order->image) }}" alt="Product Image" style="width: 100px;">
                                        </td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->rec_address }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <!-- Tombol On the Way -->
                                            <div class="d-flex gap-2">
                                                <!-- Tombol On the Way -->
                                                <form action="{{ route('updateOrderStatus', $order->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="On the Way">
                                                    <button type="submit" class="btn btn-danger">On the Way</button>
                                                </form>

                                                <!-- Tombol Delivered -->
                                                <form action="{{ route('updateOrderStatus', $order->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="Delivered">
                                                    <button type="submit" class="btn btn-success ml-2">Delivered</button>
                                                </form>
                                            </div>
                                        </td>
                                        <!-- Tombol untuk Mencetak ke PDF -->
                                        <td>
                                            <a href="{{ url('/order/' . $order->id . '/print') }}" class="btn btn-primary">Print to PDF</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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

        <!-- JavaScript files-->
        <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
        <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
        <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
        <script src="{{ asset('admincss/js/front.js') }}"></script>
    </div>
</body>

</html>