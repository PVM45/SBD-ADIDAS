@extends('frontend.frontend_master')
@section('frontend_content')

    <div class="check">
        <div class="container">
            <h1>My Shopping Bag (2)</h1>
            <br>
            @foreach ($cartItems as $item)
                <div class="col-md-9 cart-items">
                    <div class="cart-header">
                        <div class="close1"><span class="glyphicon glyphicon-remove" aria-hidden="true">
                                <form method="POST" action="{{ route('cart.remove') }}">
                                    @csrf
                                    <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                    <button type="submit">Remove</button>
                                </form>
                            </span></div>

                        <div class="cart-sec simpleCart_shelfItem">
                            <div class="cart-item cyc">
                                <img src="{{ asset('frontend/assets/images/grid8.jpg') }}" class="img-responsive"
                                    alt="" />
                            </div>
                            <div class="cart-item-info">
                                <p style="font-size: 20px"><b>{{ $item->produk->nama_produk }} -
                                        {{ $item->kuantitas }}</b>
                                </p>
                                <p>Size : {{ $item->produk->ukuran }}</p>
                                <p>Color : {{ $item->produk->varian_warna }}</p>
                                <p>Price each : $190</p>
                                <td>
                                    <form method="POST" action="{{ route('cart.update') }}">
                                        @csrf
                                        <input type="hidden" name="cart_id" value="{{ $item->id }}">
                                        <input type="number" name="quantity" value="{{ $item->kuantitas }}">
                                        <button type="submit">Update</button>
                                    </form>
                                </td>
                                <div class="delivery">
                                    <span>Delivered in 2-3 bussiness days</span>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-3 cart-total">
                <a class="continue" href="{{ route('produk.search') }}">Continue shopping</a>
                <div class="price-details">
                    <h3>Price Details</h3>
                    <span>Total</span>
                    <span class="total1">6200.00</span>
                    <span>Discount</span>
                    <span class="total1">10%(Festival Offer)</span>
                    <span>Delivery Charges</span>
                    <span class="total1">150.00</span>
                    <div class="clearfix"></div>
                </div>
                <hr class="featurette-divider">
                <ul class="total_price">
                    <li class="last_price">
                        <h4>TOTAL</h4>
                    </li>
                    <li class="last_price"><span>6150.00</span></li>
                    <div class="clearfix"> </div>
                </ul>
                <div class="clearfix"></div>
                <a class="order" href="#">
                    <form action="{{ route('author.checkout') }}" method="get">@csrf <button
                            type="submit">checkout</button>
                    </form>
                </a>
            </div>
        </div>
    </div>
@section('frontend_script')
    <!-- FlexSlider -->
    <script src="js/imagezoom.js"></script>
    <script defer src="js/jquery.flexslider.js"></script>
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
    <!-- //FlexSlider-->
@endsection
@endsection
