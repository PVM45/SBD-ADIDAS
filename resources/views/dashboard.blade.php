@extends('frontend.frontend_master')

@section('frontend_content')
<div class="body-content">
    <div class="container">
        <div class="row">
                @include('frontend.profile.user-sidebar')
            <div class="col-md-10">
                Welcome To Your Profile
                {{-- {{ env('APP_NAME') }} <strong>{{ Auth::user()->name }}</strong> --}}
                @yield('userdashboard_content')
            </div>
        </div>
    </div>
</div>
@endsection