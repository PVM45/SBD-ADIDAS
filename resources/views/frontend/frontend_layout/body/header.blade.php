<div class="header">
    <div class="container">
        <div class="header-top">
            <div class="logo">
                <img class="logoAdidas"
                    src="{{ asset('frontend') }}/assets/images/adidas logo png 3 line - Bing images_files/adidas.png"
                    alt="logo adidas">
                <a href="{{ route('home') }}">ADIDAS</a>
            </div>
            <div class="login-bars ">


                @auth

                    <a class="btn btn-primary " href="{{ route('login') }}"><i class="icon fa fa-address-card"></i></a>
                    <a class="btn btn-default " href="{{ route('cart') }}"><i class="icon fa fa-shopping-cart"></i></a>
                    <a class="btn btn-danger " href="{{ route('listWishlist') }}"><i class="icon fa fa-heart"></i></a>
                    <a class="btn btn-dark href=" {{ route('logout') }}
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="icon fa fa-sign-out"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a class="btn btn-default log-bar" href="{{ route('login') }}"><i
                            class="icon fa fa-lock"></i>Login/Register</a>
                @endauth
                <form action="{{ route('produk.search') }}" method="GET" class="input-group ">
                    <input class="form-control " type="text" placeholder="Search" aria-label="Search" name="keyword">
                    <button type="submit" class="btn btn-light"></button>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
        <!---menu-----bar--->
        <div class="header-botom">
            <div class="content white">
                <nav class="navbar navbar-default nav-menu" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="clearfix"></div>
                    <!--/.navbar-header-->
                    <hr>

                    <div class="collapse navbar-collapse collapse-pdng" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav nav-font">
                            <li class="">
                                <a href="{{ route('produk.search') }}">produk</a>
                            </li>
                            @foreach ($kategoris as $kategori)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        {{ $kategori->nama_kategori }}
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu ">
                                        <div class="row">
                                            <div class="col-sm-4 menu-img-pad">
                                                @foreach ($subkategoris as $subkategori)
                                                    <ul class="multi-column-dropdown">
                                                        <li><a
                                                                href="{{ route('produk.filter', ['kategori' => $kategori->id, 'subkategori' => $subkategori->id]) }}">{{ $subkategori->nama_subkategori }}</a>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
            </div>
            <!--/.navbar-collapse-->
            <div class="clearfix"></div>
            </nav>
            <!--/.navbar-->
            <div class="clearfix"></div>
        </div>
        <!--/.content--->
    </div>
    <!--header-bottom-->
</div>
</div>
