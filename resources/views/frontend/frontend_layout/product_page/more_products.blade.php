<div class="you-might-like">
    <div class="container">
        <h3 class="you-might">Products You May Like</h3>
        @foreach ($produks as $produk)
        <div class="col-md-4 grid-stn simpleCart_shelfItem">
            <!-- normal -->
            <div class="ih-item square effect3 bottom_to_top">
                <div class="bottom-2-top">
                    <div class="img"><img src="{{ asset('frontend') }}/assets/images/grid4.jpg" alt="/" class="img-responsive gri-wid"></div>
                    <div class="info">
                        <div class="pull-left styl-hdn">
                            <h3>{{ $produk->nama_produk}}</h3>
                        </div>
                        <div class="pull-right styl-price">
                            <p>
                                <a href="#" class="item_add">
                                    <span class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span>
                                    <span class="item_price">Rp.{{ $produk->harga_produk }}</span>
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
                    <button type="submit"> Quick view </button>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
        @endforeach
    </div>
</div>

<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
