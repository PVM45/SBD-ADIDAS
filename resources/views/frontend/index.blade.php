@extends('frontend.frontend_master')

@section('title')
    ADIDAS
@endsection

@section('frontend_content')
    @include('frontend.frontend_layout.home_page.carousel')
    @include('frontend.frontend_layout.home_page.hero')
    @include('frontend.frontend_layout.home_page.shop_grid')
@endsection


