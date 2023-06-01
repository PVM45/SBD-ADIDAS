@extends('frontend.frontend_master')

@section('frontend_content')
    <div class="container">

        @if(count($wishlists) > 0)
            <div class="row">
                @foreach($wishlists as $wishlist)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><strong>{{ $wishlist->produk->nama_produk }}</strong> </h4><br>
                                <p class="card-text"><img src="{{ url('storage/'. $wishlist->produk->gambar_produk) }}" alt="/"
                                    class="img-responsive gri-wid"></p>
                                <p class="card-text">{{ Str::limit($wishlist->produk->deskripsi_produk, 150, '...') }}</p><br>
                                <p class="card-text">Price: Rp.{{ $wishlist->produk->harga_produk }}</p><br>
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
