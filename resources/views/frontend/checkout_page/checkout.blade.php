@extends('frontend.frontend_master')
@section('frontend_content')



@foreach ($cartItems as $item)
    <div class="check">
        <div class="container">
            <div class="col-md-3 cart-total">
                <a class="continue" href="#">Continue to basket</a>
                <div class="price-details">
                    <h3>Price Details</h3>
                    <span>Total</span>
                    <span class="total1">{{$totalPrice}}</span>
                    <span>Total produk</span>
                    <span class="total1">{{$item->count}}</span>
                    
                    <div class="clearfix"></div>
                </div>
                <hr class="featurette-divider">
                <ul class="total_price">
                    <li class="last_price">
                        <h4>TOTAL</h4>
                    </li>
                    <li class="last_price"><span>{{$totalPrice}}
                    </span></li>
                    <div class="clearfix"> </div>
                </ul>
                <div class="clearfix"></div>
                @endforeach
                <form method="POST" action="{{ route('author.checkout.process') }}">
                    @csrf
                <a class="order" ><button  type="submit">Place Order</button></a>
            </div>

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
                            </div>
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

         

            <label>Pilih metode pembayaran:</label>
            <br>

            @foreach ($pembayarans as $pembayaran)
                <label>
                    <input type="radio" name="metode_pembayaran" value="{{ $pembayaran->id }}">

                    {{ $pembayaran->metode_pembayaran }}
                </label>
                <br>
            @endforeach
         
        </form>


           
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
