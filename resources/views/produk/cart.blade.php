<ul>
    @foreach ($cartItems as $item)
        <li>{{ $item->produk->nama_produk }} - {{ $item->kuantitas }}</li>
        <td>
                    <form method="POST" action="{{ route('cart.update') }}">
                        @csrf
                        <input type="hidden" name="cart_id" value="{{ $item->id }}">
                        <input type="number" name="quantity" value="{{ $item->kuantitas }}">
                        <button type="submit">Update</button>
                    </form> </td>
                    <td>
                    <form method="POST" action="{{ route('cart.remove') }}">
                        @csrf
                        <input type="hidden" name="cart_id" value="{{ $item->id }}">
                        <button type="submit">Remove</button>
                    </form>
                </td>
        <li>{{ $item->produk->varian_warna }}</li>
        <li>{{ $item->produk->ukuran }}</li>
        <li>{{ $item->produk->status_produk}}</li>
    @endforeach
    <form action=" {{ route('author.checkout')}} " method="GET">
        <button>Checkout</button>
    </form>
</ul>
