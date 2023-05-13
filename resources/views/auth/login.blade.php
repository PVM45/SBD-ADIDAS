@extends('frontend.frontend_master')
@section('frontend_content')

<div class="login">
    <div class="container">
        <div class="login-grids">
            <div class="col-md-6 log">
                     <h3>Login</h3>
                     <div class="strip"></div>
                     <p>Welcome, please enter the following to continue.</p>
                     <p>If you have previously Login with us, <a href="#">Click Here</a></p>

                     <form action="{{ route('login') }}" method="POST">
                        @csrf
                         <h5>Email:</h5>
                         @error('email')
                        <small>{{ $message }}</small>
                        @enderror	
                         <input type="email" name="email" value="">
                         <h5>Password:</h5>
                         @error('password')
                        <small>{{ $message }}</small>
                        @enderror
                         <input type="password" name="password" value=""><br>					

                         <input type="submit" value="Login">
                        
                            @if($message = Session::get('failed'))
                                <script>Swal.fire(' {{ $message }} ')</script>
                            @endif
                            @if($message = Session::get('success'))
                                <script>
                                 Swal.fire(' {{ $message }} ')
                                </script>
                            @endif
                     </form>
                    <a href="#">Forgot Password ?</a>
            </div>
            <div class="col-md-6 login-right">
                    <h3>New Registration</h3>
                    <div class="strip"></div>
                    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                    <a href="{{ route('register') }}" class="button">Create An Account</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //login-page -->
</body>
@endsection