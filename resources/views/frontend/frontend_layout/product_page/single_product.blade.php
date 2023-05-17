@extends('frontend.frontend_master')

@section('frontend_content')
    <div class="showcase-grid">
        <div class="container">
            <div class="col-md-8 showcase">
                <div class="flexslider">
                    <ul class="slides">
                        <li data-thumb="{{ asset('frontend') }}/assets/images/show.jpg">
                            <div class="thumb-image"> <img src="{{ asset('frontend') }}/assets/images/show.jpg"
                                    data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{ asset('frontend') }}/assets/images/show1.jpg">
                            <div class="thumb-image"> <img src="{{ asset('frontend') }}/assets/images/show1.jpg"
                                    data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{ asset('frontend') }}/assets/images/show2.jpg">
                            <div class="thumb-image"> <img src="{{ asset('frontend') }}/assets/images/show2.jpg"
                                    data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        <li data-thumb="{{ asset('frontend') }}/assets/images/show3.jpg">
                            <div class="thumb-image"> <img src="{{ asset('frontend') }}/assets/images/show3.jpg"
                                    data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            @foreach ($produk as $produk1)
                <div class="col-md-4 showcase">
                    <div class="showcase-rt-top">
                        <div class="pull-left shoe-name">
                            <h3>{{ $produk1->produk->nama_produk }}</h3>
                            <p>{{ $produk1->kategori->nama_kategori }},{{ $produk1->subkategori->nama_subkategori }}</p>
                            <h4>Rp.{{ $produk1->produk->harga_produk }}</h4>
                        </div>
                        <div class="pull-left rating-stars">
                            
                            <form action="{{ route('wishlist.add', $produk1->id) }}" method="POST" >
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $produk1->id }}">
                                <button class="btn btn-danger" type="submit"><i class="icon fa fa-heart"></i></button>
                            </form>
                            
                            {{-- <form action="{{ route('wishlist.remove', $produk1->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-light" type="submit"><i class="icon fa fa-trash"></i></button>
                            </form> --}}

                            <ul>
                                {{-- <h3>Rating</h3>
                                    @if ($produk->ratings->count() > 0)
                                        <p>Rata-rata Rating: {{ $produk->ratings->average('rating')}}</p>
                                    @else
                                        <p>Belum ada rating untuk artikel ini.</p>
                                    @endif --}}
                                    @foreach($produksr as $produk2)
                                        @php $rating = $produk2->pluck('rating')->average(); @endphp
                                        @php $roundedRating = round($rating); @endphp
                                        @foreach(range(1,5) as $i)
                                            <span class="fa-stack" style="width:1em">
                                                <i class="far fa-star fa-stack-1x"></i>
                                                @if($rating > 0)
                                                    @if($rating > $i)
                                                        <i class="fas fa-star fa-stack-1x"></i>
                                                    @elseif($rating > ($i - 0.5))
                                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                                    @endif
                                                @endif
                                            </span>
                                        @endforeach
                                    @endforeach
                                    
                        


                                    {{-- <h3>Rating</h3> 
                                    <br>
                                    <p>Rata-rata Rating:</p>
                                        @foreach($produksr as $produk2) --}}
                                    {{-- @if ($produk2->count() > 0) --}}
                                        {{-- <p> {{ $produk2->pluck('rating')->average() }}</p> --}}
                                    {{-- @else
                                        <p>Belum ada rating untuk artikel ini.</p>
                                    @endif --}}
                                        {{-- @endforeach --}}
                                    {{-- <form action="/single_produk/{{ $produk1->id }}/review" method="POST">
                                        @csrf
                                        <input type="hidden" name="produk_id" value="{{ $produk1->id }}">
                                        <input type="number" name="rating" min="1" max="5" required>
                                    
                                    <h3>Komentar</h3>
                                        <input type="hidden" name="produk_id" value="{{ $produk1->id }}">
                                        <textarea name="komentar" required></textarea>
                                        <button type="submit">Submit</button>
                                    </form> --}}
                                    


                                {{-- <li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn"
                                            aria-hidden="true"></span></a></li>
                                <li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn"
                                            aria-hidden="true"></span></a></li>
                                <li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn"
                                            aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-star star-stn"
                                            aria-hidden="true"></span></a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-star star-stn"
                                            aria-hidden="true"></span></a></li> --}}
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <hr class="featurette-divider">
                    <div class="shocase-rt-bot">
                        <div class="float-qty-chart">
                            <ul>

                                {{-- availability --}}

                                {{-- <div class="stock-container info-container m-t-10">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="stock-box">
                                            <span class="label">Availability :</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="stock-box">
                                            @if ($product->product_qty < 1)
                                            <span class="value">Out of Stock</span>
                                            @else
                                            <span class="value">In Stock</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                </div> --}}

                                <li class="qty">
                                    <h3>Size Chart</h3>
                                    <select class="form-control siz-chrt">
                                        <option>6 US</option>
                                        <option>7 US</option>
                                        <option>8 US</option>
                                        <option>9 US</option>
                                        <option>10 US</option>
                                        <option>11 US</option>
                                    </select>
                                </li>
                                <li class="qty">
                                    <h4>QTY</h4>
                                    <select class="form-control qnty-chrt">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                    </select>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <ul>
                            <li class="ad-2-crt simpleCart_shelfItem">
                                <a class="btn item_add" href="#" role="button">Add To Cart</a>
                                <a class="btn" href="#" role="button">Buy Now</a>
                            </li>
                        </ul>
                    </div>
                    <div class="showcase-last">
                        <h3>product details</h3>
                        <ul>
                            <li>Internal bootie wraps your foot for a sock-like fit</li>
                            <li>Unique eyestays work with the Flywire cables to create an even better glove-like fit</li>
                            <li>Waffle outsole for durability and multi-surface traction</li>
                            <li>Sculpted Cushlon midsole combines plush cushioning and springy resilience for impact
                                protection
                            </li>
                            <li>Midsole flex grooves for greater forefoot flexibility</li>
                        </ul>
                    </div>
                </div>
            
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="specifications">
        <div class="container">
            <h3>Item Details</h3>
            <div class="detai-tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-pills tab-nike" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                            data-toggle="tab">Highlights</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                            data-toggle="tab">Description</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab"
                            data-toggle="tab">Terms & conditiona</a></li>
                    <li role="presentation"><a href="#review" aria-controls="review" role="tab"
                            data-toggle="tab">Review</a></li>
                </ul>

                <!-- Tab panes -->
                @foreach ($produk as $produk1)
                    <div class="tab-content">
                        <div div role="tabpanel" class="tab-pane active" id="profile">
                            <p>{{ $produk1->produk->deskripsi_produk }}</p>
                        </div>
                        @endforeach
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <p>The full-length Max Air unit delivers excellent cushioning with enhanced flexibility for
                                smoother
                                transitions through footstrike.</p>
                            <p>Dynamic Flywire cables integrate with the laces and wrap your midfoot for a truly adaptive,
                                supportive fit.</p>
                        </div>
                        {{-- <div div role="tabpanel" class="tab-pane" id="profile">
                        <p>Nike is one of the leading manufacturer and supplier of sports equipment, footwear and apparels.
                            Nike is a global brand and it continuously creates products using high technology and design
                            innovation. Nike has a vast collection of sports shoes for men at Snapdeal. You can explore our
                            range of basketball shoes, football shoes, cricket shoes, tennis shoes, running shoes, daily
                            shoes or lifestyle shoes. Take your pick from an array of sports shoes in vibrant colours like
                            red, yellow, green, blue, brown, black, grey, olive, pink, beige and white. Designed for top
                            performance, these shoes match the way you play or run. Available in materials like leather,
                            canvas, suede leather, faux leather, mesh etc, these shoes are lightweight, comfortable, sturdy
                            and extremely sporty. The sole of all Nike shoes is designed to provide an increased amount of
                            comfort and the material is good enough to provide an improved fit. These shoes are easy to
                            maintain and last for a really long time given to their durability. Buy Nike shoes for men
                            online with us at some unbelievable discounts and great prices. So get faster and run farther
                            with your Nike shoes and track how hard you can play.</p>
                    </div> --}}
                        <div role="tabpanel" class="tab-pane" id="messages">
                            The images represent actual product though color of the image and product may slightly differ.
                        </div>
                        <div id="review" class="tab-pane" role="tabpanel">
                            <div class="product-tab">

                                <div class="product-reviews">
                                    <h4 class="title">Customer Reviews</h4><br>

                                    <div class="reviews">
                                        <div class="review">
                                                        @foreach($produks as $komen)
                                            <div class="text">{{ $komen->komentar }}</div><br>
                                                <ul>
                                                    @endforeach
                                        </div>

                                    </div><!-- /.reviews -->
                                </div><!-- /.product-reviews -->



                                <div class="product-add-review">
                                    <h4 class="title">Write your own review</h4>
                                    <div class="review-table">
                                        <div class="table-responsive">
                                        </div><!-- /.table-responsive -->
                                    </div><!-- /.review-table -->

                                    <div class="review-form">
                                        <div class="form-container">
                                            <form role="form" class="cnt-form" action="/single_produk/{{ $produk1->id }}/review" method="POST">
                                                    @csrf
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="cell-label">&nbsp;</th>
                                                                <th>1 star</th>
                                                                <th>2 stars</th>
                                                                <th>3 stars</th>
                                                                <th>4 stars</th>
                                                                <th>5 stars</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="cell-label">Quality</td>
                                                                <input type="hidden" name="produk_id" value="{{ $produk1->id  }}">
                                                                <td><input type="radio" name="rating" class="radio"
                                                                        value="1"></td>
                                                                <td><input type="radio" name="rating" class="radio"
                                                                        value="2"></td>
                                                                <td><input type="radio" name="rating" class="radio"
                                                                        value="3"></td>
                                                                <td><input type="radio" name="rating" class="radio"
                                                                        value="4"></td>
                                                                <td><input type="radio" name="rating" class="radio"
                                                                        value="5"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputReview">Review <span
                                                                    class="astk">*</span></label>
                                                                    <input type="hidden" name="produk_id" value="{{ $produk1->id }}">
                                                            <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder="" name="komentar" required></textarea>
                                                        </div><!-- /.form-group -->
                                                    </div>
                                                </div><!-- /.row --> 

                                                <div class="action text-right">
                                                    <button class="btn btn-primary btn-upper">SUBMIT
                                                        REVIEW</button>
                                                </div><!-- /.action -->

                                            </form><!-- /.cnt-form -->
                                        </div><!-- /.form-container -->
                                    </div><!-- /.review-form -->

                                </div><!-- /.product-add-review -->

                            </div><!-- /.product-tab -->
                        </div><!-- /.tab-pane -->
                    </div>
                
            </div>
        </div>
    </div>

    <!-- more_products -->
    <div class="you-might-like">
    <div class="container">
        <h3 class="you-might">Products You May Like</h3>
        @foreach ($limit as $produk3)
        <div class="col-md-4 grid-stn simpleCart_shelfItem">
            <!-- normal -->
            <div class="ih-item square effect3 bottom_to_top">
                <div class="bottom-2-top">
                    <div class="img"><img src="{{ asset('frontend') }}/assets/images/grid4.jpg" alt="/" class="img-responsive gri-wid"></div>
                    <div class="info">
                        <div class="pull-left styl-hdn">
                            <h3>{{ $produk3->nama_produk}}</h3>
                        </div>
                        <div class="pull-right styl-price">
                            <p>
                                <a href="#" class="item_add">
                                    <span class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span>
                                    <span class="item_price">Rp.{{ $produk3->harga_produk }}</span>
                                </a>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
                
            <!-- end normal -->
            <div class="quick-view">
                <form action="{{ route('produk.show', ['id' => $produk3->id]) }}" method="POST">
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


    {{-- @include('frontend.frontend_layout.product_page.more_products') --}}
{{-- @endsection --}}

<!-- //FlexSlider-->
{{-- <div class="you-might-like">
        <div class="container">
            <h3 class="you-might">Products You May Like</h3>
            <div class="col-md-4 grid-stn simpleCart_shelfItem">
                <!-- normal -->
                <div class="ih-item square effect3 bottom_to_top">
                    <div class="bottom-2-top">
                        <div class="img"><img src="{{ asset('frontend') }}/assets/images/grid4.jpg" alt="/"
                                class="img-responsive gri-wid"></div>
                        <div class="info">
                            <div class="pull-left styl-hdn">
                                <h3>style 01</h3>
                            </div>
                            <div class="pull-right styl-price">
                                <p><a href="#" class="item_add"><span
                                            class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span>
                                        <span class=" item_price">$190</span></a></p> --}}

{{-- wishlist --}}

{{-- <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                         title="" href="#" data-original-title="Wishlist">
                                         <i class="fa fa-heart"></i>
                                    </a> --}}

{{-- </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end normal -->
                <div class="quick-view">
                    <a href="single.html">Quick view</a>
                </div>
            </div>
            <div class="col-md-4 grid-stn simpleCart_shelfItem">
                <!-- normal -->
                <div class="ih-item square effect3 bottom_to_top">
                    <div class="bottom-2-top">
                        <div class="img"><img src="{{ asset('frontend') }}/assets/images/grid6.jpg" alt="/"
                                class="img-responsive gri-wid"></div>
                        <div class="info">
                            <div class="pull-left styl-hdn">
                                <h3>style 01</h3>
                            </div>
                            <div class="pull-right styl-price">
                                <p><a href="#" class="item_add"><span
                                            class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span>
                                        <span class=" item_price">$190</span></a></p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end normal -->
                <div class="quick-view">
                    <a href="single.html">Quick view</a>
                </div>
            </div>
            <div class="col-md-4 grid-stn simpleCart_shelfItem">
                <!-- normal -->
                <div class="ih-item square effect3 bottom_to_top">
                    <div class="bottom-2-top">
                        <div class="img"><img src="{{ asset('frontend') }}/assets/images/grid3.jpg" alt="/"
                                class="img-responsive gri-wid"></div>
                        <div class="info">
                            <div class="pull-left styl-hdn">
                                <h3>style 01</h3>
                            </div>
                            <div class="pull-right styl-price">
                                <p><a href="#" class="item_add"><span
                                            class="glyphicon glyphicon-shopping-cart grid-cart" aria-hidden="true"></span>
                                        <span class=" item_price">$190</span></a></p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end normal -->
                <div class="quick-view">
                    <a href="single.html">Quick view</a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div> --}}

{{-- <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
    <!-- //FlexSlider--> --}}

    {{-- <h3>Komentar Terakhir</h3>
<ul>
    @foreach($produk1->komentar->sortByDesc('created_at')->take(1) as $komentar)
        <li>{{ $komentar->komentar }}</li>
    @endforeach
</ul> --}}

    {{-- @if ($produk1->komentar->count() > 0) --}}

    {{-- <h3>Komentar Terakhir</h3>

        <ul>
            
        @foreach($produks as $komen)
        <li>{{ $komen->komentar }}</li>
        </ul> 
        @endforeach --}}
        @endforeach
    {{-- @else
        <p>Belum ada komentar untuk artikel</p>
        @endif --}}
        
        

@endsection 
        