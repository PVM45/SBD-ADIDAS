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
                                <img src="{{ url('storage/'.$item->produk->gambar_produk) }}" class="img-responsive"
                                    alt="" />
                            </div>
                            <div class="cart-item-info">
                                <p style="font-size: 20px"><b>{{ $item->produk->nama_produk }} -
                                        {{ $item->kuantitas }}</b>
                                </p>
                                <p>Size : {{ $item->produk->ukuran }}</p>
                                <p>Color : {{ $item->produk->varian_warna }}</p>
                                <p>Price each : {{ $item->produk->harga_produk }} </p>
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
