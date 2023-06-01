@extends('frontend.frontend_master')
@section('frontend_content')

    <div class="check">
        <div class="container">
            <div class="col-md-9">
                @foreach ($cartItems as $item)
                    <div class="cart-header">
                        <div class="cart-sec simpleCart_shelfItem">
                            <div class="cart-item cyc">
                                <img src="{{ url('storage/' . $item->produk->gambar_produk) }}" class="img-responsive"
                                    alt="" />
                            </div>
                            <div class="cart-item-info">
                                <p style="font-size: 20px" class=" inline-block"><b>{{ $item->produk->nama_produk }} -
                                        {{ $item->kuantitas }}</b>
                                </p>

                                <p>Size : {{ $item->produk->ukuran }}</p>
                                <p>Color : {{ $item->produk->varian_warna }}</p>
                                <p>Price each : {{ $item->produk->harga_produk }} </p>
                                <td>
                                </td>
                                <div class="delivery">
                                    <span>Delivered in 2-3 bussiness days</span>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div>
                    <label>Pilih alamat anda :</label>
                    <form action="{{ route('author.checkout.process') }}" method="post">
                        @csrf
                        @foreach ($alamat as $alamats)
                            <label for="existingAlamat{{ $loop->index }}">
                                <p><strong> <input type="radio" name="PilihanAlamat" id="existingAlamat{{ $loop->index }}"
                                        value="existing"> {{ $alamats->provinsi }}, {{ $alamats->kabupaten }},
                                    {{ $alamats->kecamatan }},
                                    {{ $alamats->kelurahan }}</strong> </p>
                                    <p>Detail Alamat: {{ $alamats->alamat }}</p>
                                    <p>Kode Pos:  {{ $alamats->kode_pos }}</p>
                                    <p>Nomor Telepon:  {{ $alamats->nomor_telepon }}</p>
                            </label>
                            <input type="hidden" value="{{ $alamats->id }}" name="existingAlamat">
                            <br><br>
                        @endforeach

                        <label>Pilih metode pembayaran:</label>
                        <br>

                        @foreach ($pembayarans as $pembayaran)
                                <input type="radio" name="metode_pembayaran" value="{{ $pembayaran->id }}">

                                {{ $pembayaran->metode_pembayaran }}
                            <br><br>
                        @endforeach

                    </form>
                </div>{{-- penutup --}}
                <div class="clearfix"> </div>
            </div>{{-- col9 --}}

            @foreach ($cartItems as $item)
                <div class="col-md-3 cart-total">
                    <a class="continue" href="{{ route('cart') }}">Continue to basket</a>
                    <div class="price-details">
                        <h3>Price Details</h3>
                        <span>Total</span>
                        <span class="total1">{{ $totalPrice }}</span>
                        <span>Total produk</span>
                        <span class="total1">{{ $item->count }}</span>

                        <div class="clearfix"></div>
                    </div>
                    <hr class="featurette-divider">
                    <ul class="total_price">
                        <li class="last_price">
                            <h4>TOTAL</h4>
                        </li>
                        <li class="last_price"><span>{{ $totalPrice }}
                            </span></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <div class="clearfix"></div>
            @endforeach

            <form method="POST" action="{{ route('author.checkout.process') }}">
                @csrf
                <button type="submit"class=" btn btn-dark btn-block"><a class="order">Place Order</a></button>
            </form>
        </div>{{-- col3 --}}
    </div>{{-- container --}}
    </div>{{-- check --}}

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
                    tampung +=
                        `<option data-prov="${element.id}" value="${element.name}" name="provinsi" >${element.name}</option>`;
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
                        tampung +=
                            `<option data-prov="${element.id}" value="${element.name}" name="kota" >${element.name}</option>`;
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
                        tampung +=
                            `<option data-prov="${element.id}" value="${element.name}" name="kecamatan" >${element.name}</option>`;
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
                        tampung +=
                            `<option data-prov="${element.id}" value="${element.name}" name="kelurahan" >${element.name}</option>`;
                    });
                    document.getElementById("kelurahan").innerHTML = tampung;
                });
        });
    </script>
@endsection
@endsection
