@extends('dashboard')
@section('userdashboard_content')
    <div class="col-md-7">
        <h1><b>Daftar Alamat</b> </h1><br>

        @if ($alamat->isEmpty())
            <p>Tidak ada alamat yang tersedia.</p>
        @else
            <ul>
                @for ($i = 1; $i <= $count; $i++)
                    @foreach ($alamat as $index => $alamats)
                        @if ($index == $i - 1)
                            <li><label>Alamat {{ $i }}</label> </li>
                            <p>{{ $alamats->provinsi }}, {{ $alamats->kabupaten }}, {{ $alamats->kecamatan }},
                                {{ $alamats->kelurahan }}</p>
                            <p>Detail Alamat : {{ $alamats->alamat }}</p>
                            <p>Kode Pos : {{ $alamats->kode_pos }}</p>
                            <p>Nomor Telepon : {{ $alamats->nomor_telepon }}</p> <br>
                        @endif
                    @endforeach
                @endfor
            </ul>
    </div>
    <div class="col-md-3">
        <h2><b>TAMBAHKAN ALAMAT</b> </h2>
        <form action=" {{ route('author.user.address.process') }} " method="post">
            @csrf
            <div class="form-group">
                <label>Provinsi:</label><br />
                <select name="provinsi" id="provinsi" >
                    <option>Pilih</option>
                </select>
            </div>
            <div class="form-group ">
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
                <input type="text" name="Alamat">
            </div>
            <div class="form-group">
                <label>Kode Pos:</label><br />
                <input type="number" name="kode_pos">
            </div>
            <div class="form-group">
                <label>Nomor Telepon:</label><br />
                <input type="text" name="nomor_telepon">
            </div>
            <button type="submit">Kirim</button>
        </form>
    </div>
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
    @endif
@endsection
