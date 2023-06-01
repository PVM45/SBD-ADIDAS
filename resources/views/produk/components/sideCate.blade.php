<div class="col-md-3 grid-details">
    <div class="grid-addon">

        <section class="sky-form">
            <div class="product_right">
                <h4 class="m_2"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Categories
                </h4>
                @foreach ($kategoris as $kategori)
                    <div class="tab1">
                        <ul class="place">
                            <li class="sort">{{ $kategori->nama_kategori }}</li>
                            <li class="by"><img src="{{ asset('frontend') }}/assets/images/do.png"
                                    alt=""></li>
                            <div class="clearfix"> </div>
                        </ul>
                        @foreach ($subkategoris as $subkategori)
                            <div class="single-bottom">
                                <a
                                    href="{{ route('produk.filter', ['kategori' => $kategori->id, 'subkategori' => $subkategori->id]) }}"><p>{{ $subkategori->nama_subkategori }}</p></a>
                                </a>
                            </div>
                            @endforeach
                    </div>
                @endforeach
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
