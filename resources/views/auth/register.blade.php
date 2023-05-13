@extends('frontend.frontend_master')
@section('frontend_content')
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
                       </ul>
                       <ul>
                        <li class="text-info">confirmation password:</li>
                        <li><input type="password" name="password_confirmation"></li>
    
                    </ul>							
                       <input type="submit" value="Register Now">
                       <p class="click">By clicking this button, you are agree to my  <a href="#">Policy Terms and Conditions.</a></p>
                      
                   </form>
			</div>
		</div>
	</div>
       
@endsection