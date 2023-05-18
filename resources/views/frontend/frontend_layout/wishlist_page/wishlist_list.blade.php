@extends('frontend.frontend_master')

@section('frontend_content')
    <div class="container">
        <h1>My Wishlist</h1> <br>

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
