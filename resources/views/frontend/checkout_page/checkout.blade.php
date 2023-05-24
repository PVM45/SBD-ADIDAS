@extends('frontend.frontend_master')
@section('frontend_content')

    <div class="check">
        <div class="container">
            <div class="col-md-3 cart-total">
                <a class="continue" href="{{ route('cart') }}">Continue to basket</a>
                <div class="price-details">
                    <h3>Price Details</h3>
                    
                        @foreach ($cartItems as $item)
                        <ul class="qty">
                        <li>
                            <p>Product : {{ $item->produk->nama_produk }}</p>
                        </li>
                        <li>
                            <p>Size : {{ $item->produk->ukuran }}</p>
                        </li>
                        <li>
                            <p>Qty : {{ $item->kuantitas }}</p>
                        </li>
                        <li>
                            <p>Price each : {{ $item->produk->harga_produk }}</p>
                        </li>
                        <li>
                            <p>Variant : {{ $item->produk->varian_warna }}</p>
                        </li>
                    </ul>
                    <hr>
                    @endforeach 

                    {{-- <span>Total</span>
                    <span class="total1">6200.00</span>
                    <span>Discount</span>
                    <span class="total1">10%(Festival Offer)</span>
                    <span>Delivery Charges</span>
                    <span class="total1">150.00</span> --}}
                    <div class="clearfix"></div>
                </div>
                <hr class="featurette-divider">
                <ul class="total_price">
                    <li class="last_price">
                        <h4>TOTAL</h4>
                    </li>
                    <li class="last_price"><span>{{$totalPrice}}</span></li>
                    <div class="clearfix"> </div>
                </ul>
            </div>

            
        <form action="{{ route('author.checkout') }}" method="post">
        @csrf
        @foreach ($alamat as $alamat1)  
        <input type="radio" name="PilihanAlamat" id="existingAlamat{{ $loop->index }}" value="existing">
        <label for="existingAlamat{{ $loop->index }}">{{ $alamat1->alamat }}</label>
        <input type="hidden" value="{{ $alamat1->alamat }}" name="existingAlamat">
        <br>
        @endforeach 
        <input type="radio" name="PilihanAlamat" id="newAlamat" value="new">
        <label for="newAlamat">Alamat Baru</label>
        <input type="text" id="alamat_baru" style="display: none;" name="newAlamat">
        <button type="submit">Place Order</button>
        </form>

            
            <div class="col-md-9 cart-items">
                <h1>My Shopping Bag (2)</h1>
                <script>
                    $(document).ready(function(c) {
                        $('.close1').on('click', function(c) {
                            $('.cart-header').fadeOut('slow', function(c) {
                                $('.cart-header').remove();
                            });
                        });
                    });
                </script>
                <div class="cart-header">
                    {{-- <div class="close1"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
                    <div class="cart-sec simpleCart_shelfItem"> --}}
                        <div class="cart-item cyc">
                            <img src="images/grid8.jpg" class="img-responsive" alt="" />
                        </div>
                        <div class="cart-item-info">
                            <ul class="qty">
                                
                             {{-- <li>{{ $item->produk->nama_produk }} - {{ $item->kuantitas }}</li>
                             <li>{{ $item->produk->varian_warna }}</li>
                              <li>{{ $item->produk->ukuran }}</li>
                                <li>{{ $item->produk->status_produk}}</li> --}}
                                     

                            {{-- <h2>total harga: {{$totalPrice}}</h2> --}}
                            </ul>
                            <div class="delivery">
                                {{-- <p>Service Charges : Rs.190.00</p>
                                <span>Delivered in 2-3 bussiness days</span> --}}
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
                <script>
                    $(document).ready(function(c) {
                        $('.close2').on('click', function(c) {
                            $('.cart-header2').fadeOut('slow', function(c) {
                                $('.cart-header2').remove();
                            });
                        });
                    });
                </script>
                <div class="cart-header2">
                    {{-- <div class="close2"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div> --}}
                    <div class="cart-sec simpleCart_shelfItem">
                        <div class="cart-item cyc">
                            <img src="images/grid7.jpg" class="img-responsive" alt="" />
                        </div>
                        <div class="cart-item-info">
                            
                            
                            <div class="delivery">
                                {{-- <p>Service Charges : Rs.360.00</p>
                                <span>Delivered in 2-3 bussiness days</span> --}}
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var radioExisting = document.querySelector('input[value="existing"]');
            var radioNew = document.querySelector('input[value="new"]');
            var alamatBaruInput = document.getElementById('alamat_baru');

            radioExisting.addEventListener('change', function () {
                alamatBaruInput.style.display = 'none';
            });

            radioNew.addEventListener('change', function () {
                alamatBaruInput.style.display = 'block';
            });
        });
    </script>
    <!-- //FlexSlider-->
@endsection
@endsection
