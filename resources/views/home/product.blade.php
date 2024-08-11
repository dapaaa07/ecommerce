<section id="shop_section" class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>

        <div class="row">
            @foreach($product as $product)

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <a href="{{ url('product_detail',$product->id) }}">
                        <div class="img-box">
                            <img src="products/{{$product->image}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>{!!Str::limit($product->title,27)!!}</h6>
                            <div class="ml-2">
                                <h6>Price IDR
                                    <span>{{$product->price}}K</span>
                                </h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="btn-box">
            <a href="{{ url('/shop') }}">
                View All Products
            </a>
        </div>
    </div>
</section>