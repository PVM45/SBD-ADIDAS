{{-- @extends('frontend.frontend_master')
=======
@extends('frontend.frontend_master')
//
@section('title')
    ADIDAS - Wishlist Page
@endsection

@section('frontend_content')
<div class="body-content">
	<div class="container">
    <div class="my-wishlist-page">
        <div class="row">
            <div class="col-md-12 my-wishlist">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="4" class="heading-title">My Wishlist</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wishlists as $wish)
                            @foreach ($wish->produk as $produks )
                            <tr>
                                <td class="col-md-2"><img src="{{ asset($produks->produks_thumbnail) }}" alt="imga"></td>
                                <td class="col-md-7">
                                    <div class="product-name"><a href="{{ route('frontend-product-details',['id' => $produks->id, 'slug' => $produks->product_slug_en]) }}">
                                        @if (session()->get('language') == 'bangla')
                                            {{ $produks->nama_produk }}
                                        @else
                                            {{ $produks->product_name_en }}

                                        @endif
                                    </a></div>
                                        @if ($product->discount_price == NULL)
                                        <div class="price">${{ $product->selling_price }}</div>
                                        @else
                                        <div class="price">${{ $product->discount_price }}
                                        <span class="price-before-discount">${{ $product->selling_price }}</span>
                                        </div>
                                        @endif
                                </td>
                                <td class="col-md-2">
                                    <button class="btn-upper btn btn-primary" type="button" data-toggle="modal"
                                    data-target="#productViewModal" onclick="productView(this.id)"
                                    id="{{ $product->id }}">Add to cart</button>
                                </td>
                                <td class="col-md-1 close-btn">
                                    <button type="button" class="" onclick="removeWishlist(this.id)" id={{ $wish->id }}><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.row -->
    </div>
    </div>
</div>
@endsection --}}
@extends('frontend.frontend_master')

@section('Wishlist')

@endsection

@section('frontend_content')
    <div class="container">
        <h1>My Wishlist</h1>

        @if(count($wishlists) > 0)
            <div class="row">
                @foreach($wishlists as $wishlist)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $wishlist->produk->nama_produk }}</h5>
                                <p class="card-text">{{ $wishlist->produk->deskripsi_produk }}</p>
                                <p class="card-text">Price: ${{ $wishlist->produk->harga_produk }}</p>
                                <form action="{{ route('wishlist.remove', $wishlist->produk->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $wishlists->links() }}
        @else
            <p>No items in wishlist.</p>
        @endif
    </div><br>

@endsection
