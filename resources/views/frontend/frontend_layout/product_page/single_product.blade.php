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
                        <h3>{{ $produk1->produk->nama_produk}}</h3>
                        <p>{{ $produk1->kategori->nama_kategori }},{{ $produk1->subkategori->nama_subkategori }}</p>
                        <h4>Rp.{{ $produk1->produk->harga_produk }}</h4>
                    </div> 
                    <div class="pull-left rating-stars">
                        <form action="{{ route('wishlist.add', $produk1->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="produk_id" value="{{ $produk1->id }}">
                                <button type="submit">Add to Wishlist</button>
                                                </form>
                                                    <form action="{{ route('wishlist.remove', $produk1->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">Remove from Wishlist</button>
                                                    </form>
                                                    @endforeach
                        <ul>
                            <li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn"
                                        aria-hidden="true"></span></a></li>
                            <li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn"
                                        aria-hidden="true"></span></a></li>
                            <li><a href="#" class="active"><span class="glyphicon glyphicon-star star-stn"
                                        aria-hidden="true"></span></a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-star star-stn"
                                        aria-hidden="true"></span></a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-star star-stn"
                                        aria-hidden="true"></span></a></li>
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
                        <li>Sculpted Cushlon midsole combines plush cushioning and springy resilience for impact protection
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
                    <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab"
                            data-toggle="tab">Description</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab"
                            data-toggle="tab">Terms & conditiona</a></li>
                    <li role="presentation"><a href="#review" aria-controls="review" role="tab"
                            data-toggle="tab">Review</a></li>
                </ul>
                {{-- review --}}





                <!-- Tab panes -->
                <div class="tab-content">
                    <div div role="tabpanel" class="tab-pane active" id="profile">
                        <p>{{ $produk1->produk->deskripsi_produk }}</p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">
                        The images represent actual product though color of the image and product may slightly differ.
                    </div>
                    <div id="review" class="tab-pane" role="tabpanel">
                        <div class="product-tab">

                            <div class="product-reviews">
                                <h4 class="title">Customer Reviews</h4><br>

                                <div class="reviews">
                                    <div class="review">
                                        <div class="review-title"><span class="summary">We love this
                                                product </span><span class="date">&nbsp;<i
                                                    class="fa fa-calendar"></i><span>1 days
                                                    ago</span></span></div><br>
                                        <div class="text">"Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit.Aliquam suscipit."</div><br>
                                    </div>

                                </div><!-- /.reviews -->
                            </div><!-- /.product-reviews -->



                            <div class="product-add-review">
                                <h4 class="title">Write your own review</h4>
                                <div class="review-table">
                                    <div class="table-responsive">
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
                                                    <td><input type="radio" name="quality" class="radio"
                                                            value="1"></td>
                                                    <td><input type="radio" name="quality" class="radio"
                                                            value="2"></td>
                                                    <td><input type="radio" name="quality" class="radio"
                                                            value="3"></td>
                                                    <td><input type="radio" name="quality" class="radio"
                                                            value="4"></td>
                                                    <td><input type="radio" name="quality" class="radio"
                                                            value="5"></td>
                                                </tr>
                                                <tr>
                                                    <td class="cell-label">Price</td>
                                                    <td><input type="radio" name="quality" class="radio"
                                                            value="1"></td>
                                                    <td><input type="radio" name="quality" class="radio"
                                                            value="2"></td>
                                                    <td><input type="radio" name="quality" class="radio"
                                                            value="3"></td>
                                                    <td><input type="radio" name="quality" class="radio"
                                                            value="4"></td>
                                                    <td><input type="radio" name="quality" class="radio"
                                                            value="5"></td>
                                                </tr>
                                                <tr>
                                                    <td class="cell-label">Value</td>
                                                    <td><input type="radio" name="quality" class="radio"
                                                            value="1"></td>
                                                    <td><input type="radio" name="quality" class="radio"
                                                            value="2"></td>
                                                    <td><input type="radio" name="quality" class="radio"
                                                            value="3"></td>
                                                    <td><input type="radio" name="quality" class="radio"
                                                            value="4"></td>
                                                    <td><input type="radio" name="quality" class="radio"
                                                            value="5"></td>
                                                </tr>
                                            </tbody>
                                        </table><!-- /.table .table-bordered -->
                                    </div><!-- /.table-responsive -->
                                </div><!-- /.review-table -->

                                <div class="review-form">
                                    <div class="form-container">
                                        <form role="form" class="cnt-form">

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputName">Your Name <span
                                                                class="astk">*</span></label>
                                                        <input type="text" class="form-control txt"
                                                            id="exampleInputName" placeholder="">
                                                    </div><!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label for="exampleInputSummary">Summary <span
                                                                class="astk">*</span></label>
                                                        <input type="text" class="form-control txt"
                                                            id="exampleInputSummary" placeholder="">
                                                    </div><!-- /.form-group -->
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputReview">Review <span
                                                                class="astk">*</span></label>
                                                        <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
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


    {{-- @include('frontend.frontend_layout.product_page.more_products') --}}
@endsection

    <!-- //FlexSlider-->
