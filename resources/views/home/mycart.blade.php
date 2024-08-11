<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .item-checkbox-wrapper {
            display: flex;
            align-items: center;
            margin-right: 15px;
        }

        .item-checkbox {
            margin-right: 10px;
        }

        .item-checkbox-label {
            margin: 0;
            font-weight: normal;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section start -->
        @include('home.header')
        <!-- header section end -->
    </div>
    <!-- end hero area -->

    <!-- shop section -->
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="mb-3">
                                        <a href="{{ url('/dashboard') }}" class="text-body">
                                            <i class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping
                                        </a>
                                    </h5>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <p class="mb-0">You have
                                            <span id="cart-count-mycart">{{ $cartCount }}</span>
                                            in your cart
                                        </p>
                                    </div>
                                </div>
                            </div>

                            @foreach($cart as $item)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex flex-row align-items-center">
                                            <img src="products/{{ $item->image }}" class="img-fluid rounded-3" alt="Shopping item" style="width: 150px;">
                                            <div class="ms-3 ml-3">
                                                <h5>{{ $item->title }}</h5>
                                                <p class="fw-normal mb-0">
                                                    Quantity:
                                                    <button class="btn btn-outline-secondary btn-sm" onclick="updateQuantity('{{ $item->product_id }}', -1)">-</button>
                                                    <span id="quantity-{{ $item->product_id }}">{{ $item->total_quantity }}</span>
                                                    <button class="btn btn-outline-secondary btn-sm" onclick="updateQuantity('{{ $item->product_id }}', 1)">+</button>
                                                </p>
                                                <!-- Checkbox to select item -->
                                                <div class="item-checkbox-wrapper">
                                                    <input type="checkbox" class="item-checkbox" value="{{ $item->product_id }}" id="checkbox-{{ $item->product_id }}" />
                                                    <label for="checkbox-{{ $item->product_id }}" class="item-checkbox-label">Select</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <div class="me-3">
                                                <h5 id="total-price-{{ $item->product_id }}">{{ number_format($item->total_price, 0, ',', '.') }}K</h5>
                                            </div>
                                            <a href="{{ url('remove_cart_item', $item->product_id) }}" style="color: #cecece;">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <!-- Button for Checkout -->
                            <div class="text-center mt-4">
                                <button class="btn btn-primary" onclick="checkout()">Proceed to Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end shop section -->

    <!-- JavaScript for handling the checkout -->
    <script>
        function updateQuantity(productId, change) {
            const quantityElement = document.getElementById(`quantity-${productId}`);
            const currentQuantity = parseInt(quantityElement.textContent, 10);
            const newQuantity = currentQuantity + change;

            if (newQuantity >= 0) {
                fetch('/update_quantity', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            quantity_change: change,
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update quantity displayed
                            quantityElement.textContent = newQuantity;

                            // Update total price if necessary
                            updateTotalPrice(productId, newQuantity);

                            // Refresh cart count
                            updateCartCount();
                        } else {
                            alert('Failed to update quantity');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }

        function updateCartCount() {
            fetch('/cart_count', {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update cart count in header
                        const cartCountElement = document.querySelector('.cart-count');
                        if (cartCountElement) {
                            cartCountElement.textContent = data.cartCount;
                        } else {
                            console.error('Cart count element in header not found');
                        }

                        // Update cart count in mycart view
                        const cartCountMyCart = document.querySelector('#cart-count-mycart');
                        if (cartCountMyCart) {
                            cartCountMyCart.textContent = data.cartCount;
                        } else {
                            console.error('Cart count element in mycart view not found');
                        }
                    } else {
                        console.error('Failed to fetch cart count');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }




        function updateTotalPrice(productId, quantity) {
            // Fetch product details to get the price
            fetch(`/get_product_price/${productId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const price = data.price;
                        const totalPrice = price * quantity;
                        document.getElementById(`total-price-${productId}`).textContent = `${totalPrice.toLocaleString()}K`;
                    } else {
                        console.error('Failed to fetch product price');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        function checkout() {
            // Get selected items
            const selectedItems = [];
            document.querySelectorAll('.item-checkbox:checked').forEach(checkbox => {
                selectedItems.push(checkbox.value);
            });

            if (selectedItems.length > 0) {
                // Convert array to query string
                const queryString = selectedItems.map(id => `product_ids[]=${encodeURIComponent(id)}`).join('&');
                // Redirect to checkout page with selected items
                window.location.href = `/checkout?${queryString}`;
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'No Items Selected',
                    text: 'Please select at least one item to proceed.',
                    confirmButtonText: 'OK'
                });
            }
        }
    </script>

    <!-- Include necessary scripts -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add SweetAlert2 via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>