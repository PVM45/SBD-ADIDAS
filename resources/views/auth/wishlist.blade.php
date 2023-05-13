<a href="{{ route('wishlist.add', $product->id) }}">Add to Wishlist</a>

<form action="{{ route('wishlist.remove', $product->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Remove from Wishlist</button>
</form>