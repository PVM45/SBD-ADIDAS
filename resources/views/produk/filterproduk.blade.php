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
                                        <p><a href="#" class="item_add"><span
                                                    class="glyphicon glyphicon-shopping-cart grid-cart"
                                                    aria-hidden="true"></span> <span
                                                    class=" item_price">Rp.{{ $produk->harga_produk }}</span></a></p>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end normal -->
                        <div class="quick-view">
                            <form action="{{ route('produk.show', ['id' => $produk->id]) }}"" method="POST">
                                @csrf
                                <button type="submit"> Quick view </button>
                            </form>
                        </div>
                </div>
                <div class="col-md-4 grid-stn simpleCart_shelfItem">
                    {{-- @endforeach --}}
                    @endforeach
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-3 grid-details">
                <div class="grid-addon">
                    <section class="sky-form">
                        <div class="product_right">
                            <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories
                            </h4>
                            <div class="tab1">
                                <ul class="place">
                                    <li class="sort">Men</li>
                                    <li class="by"><img src="{{ asset('frontend') }}/assets/images/do.png"
                                            alt=""></li>
                                    <div class="clearfix"> </div>
                                </ul>
                                <div class="single-bottom">
                                    <a href="#">
                                        <p>Running</p>
                                    </a>
                                    <a href="#">
                                        <p>Foot ball</p>
                                    </a>
                                    <a href="#">
                                        <p>Daily</p>
                                    </a>
                                    <a href="#">
                                        <p>Sneakers</p>
                                    </a>
                                </div>
                            </div>
                            <div class="tab2">
                                <ul class="place">
                                    <li class="sort">Women</li>
                                    <li class="by"><img src="{{ asset('frontend') }}/assets/images/do.png"
                                            alt=""></li>
                                    <div class="clearfix"> </div>
                                </ul>
                                <div class="single-bottom">
                                    <a href="#">
                                        <p>Tracks</p>
                                    </a>
                                    <a href="#">
                                        <p>Tees</p>
                                    </a>
                                    <a href="#">
                                        <p>Hair bands</p>
                                    </a>
                                    <a href="#">
                                        <p>Wrist bands</p>
                                    </a>
                                </div>
                            </div>
                            <div class="tab3">
                                <ul class="place">
                                    <li class="sort">Kids</li>
                                    <li class="by"><img src="{{ asset('frontend') }}/assets/images/do.png"
                                            alt=""></li>
                                    <div class="clearfix"> </div>
                                </ul>
                                <div class="single-bottom">
                                    <a href="#">
                                        <p>Running app</p>
                                    </a>
                                    <a href="#">
                                        <p>Training club</p>
                                    </a>
                                    <a href="#">
                                        <p>Nike Fuel+Band se</p>
                                    </a>
                                </div>
                            </div>
                            <!--script-->
                            <script>
                                $(document).ready(function() {
                                    $(".tab1 .single-bottom").hide();
                                    $(".tab2 .single-bottom").hide();
                                    $(".tab3 .single-bottom").hide();
                                    $(".tab4 .single-bottom").hide();
                                    $(".tab5 .single-bottom").hide();

                                    $(".tab1 ul").click(function() {
                                        $(".tab1 .single-bottom").slideToggle(300);
                                        $(".tab2 .single-bottom").hide();
                                        $(".tab3 .single-bottom").hide();
                                        $(".tab4 .single-bottom").hide();
                                        $(".tab5 .single-bottom").hide();
                                    })
                                    $(".tab2 ul").click(function() {
                                        $(".tab2 .single-bottom").slideToggle(300);
                                        $(".tab1 .single-bottom").hide();
                                        $(".tab3 .single-bottom").hide();
                                        $(".tab4 .single-bottom").hide();
                                        $(".tab5 .single-bottom").hide();
                                    })
                                    $(".tab3 ul").click(function() {
                                        $(".tab3 .single-bottom").slideToggle(300);
                                        $(".tab4 .single-bottom").hide();
                                        $(".tab5 .single-bottom").hide();
                                        $(".tab2 .single-bottom").hide();
                                        $(".tab1 .single-bottom").hide();
                                    })
                                    $(".tab4 ul").click(function() {
                                        $(".tab4 .single-bottom").slideToggle(300);
                                        $(".tab5 .single-bottom").hide();
                                        $(".tab3 .single-bottom").hide();
                                        $(".tab2 .single-bottom").hide();
                                        $(".tab1 .single-bottom").hide();
                                    })
                                    $(".tab5 ul").click(function() {
                                        $(".tab5 .single-bottom").slideToggle(300);
                                        $(".tab4 .single-bottom").hide();
                                        $(".tab3 .single-bottom").hide();
                                        $(".tab2 .single-bottom").hide();
                                        $(".tab1 .single-bottom").hide();
                                    })
                                });
                            </script>
                            <!-- script -->
                    </section>
                    <section class="sky-form">

                        <h4><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>DISCOUNTS</h4>
                        <div class="row row1 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Upto -
                                    10% (20)</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>40% - 50%
                                    (5)</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20%
                                    (7)</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5%
                                    (2)</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other(50)</label>
                            </div>
                        </div>
                    </section>
                    <!---->
                    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
                    <script type='text/javascript'>
                        //<![CDATA[
                        $(window).load(function() {
                            $("#slider-range").slider({
                                range: true,
                                min: 0,
                                max: 400000,
                                values: [2500, 350000],
                                slide: function(event, ui) {
                                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                                }
                            });
                            $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider(
                                "values", 1));

                        }); //]]>
                    </script>


                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
