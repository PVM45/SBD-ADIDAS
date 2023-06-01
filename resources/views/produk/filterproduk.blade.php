@extends('frontend.frontend_master')

@section('frontend_content')
    <div class="products-gallery">
        <div class="container">
            <div class="col-md-9 grid-gallery">
                <div class="col-md-4 grid-stn simpleCart_shelfItem">
                    <!-- normal -->
                    @foreach ($produks as $produk)
                        <div class="ih-item square effect3 bottom_to_top">
                            <div class="bottom-2-top">
                                <div class="img"><img src="{{ url('storage/' . $produk->gambar_produk) }}" alt="/"
                                        class="img-responsive gri-wid"></div>
                                <div class="info">
                                    <div class="pull-left styl-hdn">
                                        <h3>{{ $produk->nama_produk }}</h3>
                                    </div>
                                    <div class="pull-right styl-price">
                                        <p>
                                            <a class="item_add">
                                            <span class="glyphicon glyphicon-shopping-cart grid-cart"aria-hidden="true"></span>
                                            <span class=" item_price">Rp.{{ $produk->harga_produk }}</span>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end normal -->
                        <div class="quick-view">
                            <form action="{{ route('produk.show', ['id' => $produk->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-light"><i class="fa fa-eye fa-1x"></i></button>
                            </form>
                        </div>
                </div>
                <div class="col-md-4 grid-stn simpleCart_shelfItem">
                    @endforeach
                </div>
                <div class="clearfix"></div>
            </div>
            @include('produk.components.sideCate')
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
