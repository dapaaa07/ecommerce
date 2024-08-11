<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    </div>

    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="mb-3">Checkout</h5>
                            <hr>
                            @foreach($cartItems as $item)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex flex-row align-items-center">
                                            <img src="products/{{ $item->image }}" class="img-fluid rounded-3" alt="Product" style="width: 150px;">
                                            <div class="ms-3 ml-3">
                                                <h5>{{ $item->title }}</h5>
                                                <p class="fw-normal mb-0">Quantity: {{ $item->total_quantity }}</p>
                                                <h5>Total Price: {{ number_format($item->total_price, 0, ',', '.') }}K</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <h4 class="text-center mt-4">Total Harga: {{ number_format($totalPrice, 0, ',', '.') }}K</h4>

                            <!-- Form untuk detail pengiriman -->
                            <form id="checkout-form" method="POST" action="{{ route('checkout.submit') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="rec_name" class="form-label">Nama Penerima</label>
                                    <input type="text" class="form-control" id="rec_name" name="rec_name" value="{{ $user->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="rec_address" class="form-label">Alamat Penerima</label>
                                    <textarea class="form-control" id="rec_address" name="rec_address" rows="3" required>{{ $user->address }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="rec_phone" class="form-label">No. Telepon Penerima</label>
                                    <input type="text" class="form-control" id="rec_phone" name="rec_phone" value="{{ $user->phone }}" required>
                                </div>
                                <input type="hidden" name="product_ids" value="{{ implode(',', $productIds) }}">
                                <button type="submit" class="btn btn-primary">Place Order</button>
                                <a href="{{ url('/mycart') }}" class="btn btn-secondary">Batal</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>