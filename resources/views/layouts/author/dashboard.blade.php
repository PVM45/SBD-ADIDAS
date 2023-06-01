@extends('frontend.frontend_master')

@section('frontend_content')
<div class="body-content">
    <div class="container">
        <div class="row">
                @include('frontend.profile.user-sidebar')
            <div class="col-md-10">
               <h1 class="text-center"> Welcome {{ Auth::user()->name }}!!</h1>
                @yield('userdashboard_content')
            </div>
        </div>
    </div>
</div>
@endsection
