@extends('frontend.frontend_master')
@section('frontend_content')

    <div class="check">
        <div class="container">
            <div class="col-md-3 cart-total">
                <a class="continue" href="#">Continue to basket</a>
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
                <a class="order" href="#">Place Order</a>
            </div>

        <form action="{{ route('author.checkout.process') }}" method="post">
        @csrf
        @foreach ($alamat as $alamats)
        <input type="radio" name="PilihanAlamat" id="existingAlamat{{ $loop->index }}" value="existing">
        <label for="existingAlamat{{ $loop->index }}"> 
            <p> {{ $alamats->provinsi }}, {{ $alamats->kabupaten }}, {{ $alamats->kecamatan }}, {{ $alamats->kelurahan }} </p>
            <strong>Detail Alamat:</strong> {{ $alamats->alamat }} <br>
            <strong>Kode Pos: </strong> {{ $alamats->kode_pos }}
            <strong>Nomor Telepon: </strong> {{ $alamats->nomor_telepon }}</label>
        <input type="hidden" value="{{ $alamats->id }}" name="existingAlamat">
        <br>
        @endforeach
        <input type="radio" name="PilihanAlamat" id="newAlamat" value="new">
        <label for="newAlamat">Alamat Baru</label>
        <div class="form-group">
            <label>Provinsi:</label><br />
            <select name="provinsi" id="provinsi">
                <option>Pilih</option>
            </select>
        </div>
        <div class="form-group">
            <label>Kab/Kota:</label><br />
            <select name="kota" id="kota">
                <option>Pilih</option>
            </select>
        </div>
        <div class="form-group">
            <label>Kecamatan:</label><br />
            <select name="kecamatan" id="kecamatan">
                <option>Pilih</option>
            </select>
        </div>
        <div class="form-group">
            <label>Kelurahan:</label><br />
            <select name="kelurahan" id="kelurahan">
                <option>Pilih</option>
            </select>
        </div>
        <div class="form-group">
            <label>Detail Alamat:</label><br />
            <input type="text" name="newAlamat">
        </div>
        <div class="form-group">
            <label>Kode Pos:</label><br />
            <input type="number" name="kode_pos">
        </div>
        <div class="form-group">
            <label>Nomor Telepon:</label><br />
            <input type="text" name="nomor_telepon">
        </div>
        <br />



        <br>
        <br>

        {{-- <form method="POST" action="{{ route('author.checkout.proses.pembayaran') }}">
            @csrf --}}

            <label>Pilih metode pembayaran:</label>
            <br>

            @foreach ($pembayarans as $pembayaran)
                <label>
                    <input type="radio" name="metode_pembayaran" value="{{ $pembayaran->id }}">

                    {{ $pembayaran->metode_pembayaran }}
                </label>
                <br>
            @endforeach
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
                    <div class="close1"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
                    <div class="cart-sec simpleCart_shelfItem">
                        <div class="cart-item cyc">
                            <img src="images/grid8.jpg" class="img-responsive" alt="" />
                        </div>
                        <div class="cart-item-info">
                            <ul class="qty">
                                <li>
                                    <p>Size : 9 US</p>
                                </li>
                                <li>
                                    <p>Qty : 1</p>
                                </li>
                                <li>
                                    <p>Price each : $190</p>
                                </li>
                            </ul>
                            <div class="delivery">
                                <p>Service Charges : Rs.190.00</p>
                                <span>Delivered in 2-3 bussiness days</span>
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
                    <div class="close2"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
                    <div class="cart-sec simpleCart_shelfItem">
                        <div class="cart-item cyc">
                            <img src="images/grid7.jpg" class="img-responsive" alt="" />
                        </div>
                        <div class="cart-item-info">
                            <ul class="qty">
                                <li>
                                    <p>Size : 8 US</p>
                                </li>
                                <li>
                                    <p>Qty : 2</p>
                                </li>
                                <li>
                                    <p>Price each : $190</p>
                                </li>
                            </ul>
                            <div class="delivery">
                                <p>Service Charges : Rs.360.00</p>
                                <span>Delivered in 2-3 bussiness days</span>
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
    <script>
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
            .then((response) => response.json())
            .then((provinces) => {
                var data = provinces;
                var tampung = `<option>Pilih</option>`;
                data.forEach((element) => {
                    tampung += `<option data-prov="${element.id}" value="${element.name}" name="provinsi" >${element.name}</option>`;
                });
                document.getElementById("provinsi").innerHTML = tampung;
            });
    </script>
    <script>
        const selectProvinsi = document.getElementById('provinsi');
        const selectKota = document.getElementById('kota');
        const selectKecamatan = document.getElementById('kecamatan');
        const selectKelurahan = document.getElementById('kelurahan');

        selectProvinsi.addEventListener('change', (e) => {
            var provinsi = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
                .then((response) => response.json())
                .then((regencies) => {
                    var data = regencies;
                    var tampung = `<option>Pilih</option>`;
                    document.getElementById('kota').innerHTML = '<option>Pilih</option>';
                    document.getElementById('kecamatan').innerHTML = '<option>Pilih</option>';
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                    data.forEach((element) => {
                        tampung += `<option data-prov="${element.id}" value="${element.name}" name="kota" >${element.name}</option>`;
                    });
                    document.getElementById("kota").innerHTML = tampung;
                });
        });

        selectKota.addEventListener('change', (e) => {
            var kota = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
                .then((response) => response.json())
                .then((districts) => {
                    var data = districts;
                    var tampung = `<option>Pilih</option>`;
                    document.getElementById('kecamatan').innerHTML = '<option>Pilih</option>';
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                    data.forEach((element) => {
                        tampung += `<option data-prov="${element.id}" value="${element.name}" name="kecamatan" >${element.name}</option>`;
                    });
                    document.getElementById("kecamatan").innerHTML = tampung;
                });
        });
        selectKecamatan.addEventListener('change', (e) => {
            var kecamatan = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
                .then((response) => response.json())
                .then((villages) => {
                    var data = villages;
                    var tampung = `<option>Pilih</option>`;
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                    data.forEach((element) => {
                        tampung += `<option data-prov="${element.id}" value="${element.name}" name="kelurahan" >${element.name}</option>`;
                    });
                    document.getElementById("kelurahan").innerHTML = tampung;
                });
        });
    </script>
@endsection
@endsection
