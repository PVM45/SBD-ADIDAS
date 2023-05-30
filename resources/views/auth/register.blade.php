@extends('frontend.frontend_master')
@section('frontend_content')
    {{-- <div class="reg-form">
        <div class="container">
            <div class="reg">
                <h3>Register Now</h3>
                <p>Welcome, please enter the following details to continue.</p>
                <p>If you have previously registered with us, <a href="/login">click here</a></p>
                <form action="{{ route('register_proses') }}" method="POST">
                    @csrf
                    <ul>
                        <li class="text-info">Full Name: </li>
                        <li><input type="text" name="nama_user" value="{{ old('nama') }}"></li>
                        @error('nama_user')
                            <small>{{ $message }}</small>
                        @enderror
                    </ul>
                    <ul>
                        <li class="text-info">Email: </li>
                        <li><input type="email" name="email" value="{{ old('email') }}"></li>
                        @error('email')
                            <small>{{ $message }}</small>
                        @enderror
                    </ul>
                    <ul>
                        <li class="text-info">Password: </li>
                        <li><input type="password" name="password" value=""></li>
                        @error('password')
                            <small>{{ $message }}</small>
                        @enderror
                    </ul>
                    <ul>
                        <li class="text-info">Mobile Number:</li>
                        <li><input type="text" name="telp" value="{{ old('telp') }}"></li>
                        @error('telp')
                            <small>{{ $message }}</small>
                        @enderror
                    </ul>
                    <ul>
                        <li class="text-info">Alamat:</li>
                        <li><input type="text" name="alamat" value="{{ old('alamat') }}"></li>
                        @error('alamat')
                            <small>{{ $message }}</small>
                        @enderror
                    </ul>
                    <input type="submit" value="Register Now">
                    <p class="click"></p><input type="radio"> By clicking this button, you are agree to my <a
                        href="/policy">Policy Terms and Conditions.</a>

                </form>
            </div>
        </div>
    </div>
@endsection --}}

	<div class="reg-form">
		<div class="container">
			<div class="reg">
				<h3>Register Now</h3>
				<p>Welcome, please enter the following details to continue.</p>
				<p>If you have previously registered with us, <a href="#">click here</a></p>
                <form action="{{route('register')}}" method="POST">
                    @csrf
                       <ul>
                           <li class="text-info">Full Name: </li>
                           <li><input type="text" name="name" value="{{old('name')}}"></li>
                           @error('name')
                                   <small>{{ $message }}</small>
                       @enderror 
                       </ul>		 
                       <ul>
                           <li class="text-info">Email: </li>
                           <li><input type="email" name="email" value="{{old('email')}}"></li>
                           @error('email')
                                   <small>{{ $message }}</small>
                       @enderror 
                       </ul>
                       <ul>
                           <li class="text-info">Password: </li>
                           <li><input type="password" name="password" value=""></li>
                           @error('password')
                                   <small>{{ $message }}</small>
                       @enderror 
                       </ul>
                       <ul>
                        <li class="text-info">confirmation password:</li>
                        <li><input type="password" name="password_confirmation"></li>
    
                    </ul>
                       {{-- <ul>
                           <li class="text-info">Mobile Number:</li>
                           <li><input type="text" name="nomor_telepon" value="{{old('nomor_telepon')}}"></li>
                           @error('nomor_telepon')
                                   <small>{{ $message }}</small>
                       @enderror 
                       </ul>
                       <ul>
                           <li class="text-info">Alamat:</li>
                           <li><input type="text" name="alamat" value="{{old('alamat')}}"></li>
                           @error('alamat')
                                   <small>{{ $message }}</small>
                       @enderror 
                       </ul> --}}
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
                    <br />
                       							
                       <input type="submit" value="Register Now">

                       <p class="click"></p><input type="radio"> By clicking this button, you are agree to my <a
                        href="/term_policy">Policy Terms and Conditions.</a>
                   </form>
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
			</div>
		</div>
	</div>
       
@endsection

