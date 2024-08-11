<!DOCTYPE html>
<html>

<head>
    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th,
        .table td {
            padding: 8px;
            text-align: left;
            position: relative;
        }



        .table td {
            border-bottom: 1px solid #ddd;
            /* Garis bawah pada setiap baris */
        }

        .total-amount-row {
            border-top: 2px solid #000;
            /* Garis horizontal di atas Total Amount */
            padding-top: 8px;
            /* Jarak atas untuk memberikan ruang antara tabel dan Total Amount */
            text-align: right;
            /* Menyelaraskan Total Amount ke kanan */
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header bg-black"></div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="far fa-building text-danger fa-6x float-start"></i>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <ul class="list-unstyled float-end">
                            <li style="font-size: 30px; color: red;">Sopi</li>
                            <li>Cikampek</li>
                            <li>0812-9495-0241</li>
                            <li>nawizezen@gmail.com</li>
                        </ul>
                    </div>
                </div>

                <div class="row text-center">
                    <h3 class="text-uppercase text-center mt-3" style="font-size: 40px;">Invoice</h3>
                    <p>{{ $orderId }}</p> <!-- Menampilkan orderId -->
                </div>

                <div class="row mx-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Description</th>
                                <th scope="col" class="amount">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderItems as $item)
                            <tr>
                                <td>{{ $item->title }} (Quantity: {{ $item->quantity }})</td>
                                <td class="amount"><i class="fas fa-dollar-sign">{{ number_format($item->total_price, ) }}K</i></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



                <!-- Total Amount -->
                <div class="row total-amount-row">
                    <div class="col-xl-12">
                        <p class="fw-bold">Total Amount: <i class="fas fa-dollar-sign">{{ $totalPrice }}</i></p>
                    </div>
                </div>

                <div class="row mt-2 mb-5">
                    <p class="fw-bold">Date: <span class="text-muted">{{ $orderDate }}</span></p>
                </div>
            </div>
        </div>
        <div class="card-footer bg-black"></div>
    </div>
</body>

</html>