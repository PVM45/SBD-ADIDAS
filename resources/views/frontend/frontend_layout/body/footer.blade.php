<div class="sub-news">
    <img width="200px"
        src="{{ asset('frontend') }}/assets/images/adidas logo png 3 line - Bing images_files/adidas.png"
        alt="logo adidas">
    <div class="container">
        <form action=" {{ route('subscribe') }} " method="POST">
            @csrf
            <h3>DAFTARKAN EMAIL ANDA UNTUK MENDAPATKAN INFO DAN PENAWARAN SPESIAL</h3>
            <input type="email" name="email" class="sub-email"> &nbsp;&nbsp;
            <button class="btn btn-primary"> SUBSCRIBE </button>
        </form>
    </div>
</div>
<div class="footer-grid">
    <div class="container">

        <div class="col-md-2 re-ft-grd">
            <h3>Short links</h3>
            <ul class="shot-links">
                <li><a href="{{ route('contact') }}">Contact us</a></li>
                <li><a href="{{route('contact')}}">Support</a></li>
                <li><a href="{{route('author.user.orders')}}">Delivery</a></li>

                <li><a href="{{route('term.policy')}}">Return Policy</a></li>
                <li><a href="{{route('term.policy')}}">Terms & conditions</a></li>
                <li><a href="{{route('contact')}}">Sitemap</a></li>
            </ul>
        </div>
        <div class="col-md-2 re-ft-grd">
        </div>
        <div class="col-md-6 re-ft-grd">
            <h3>Social</h3>
            <ul class="social">
                <li><a href="#" class="fb">facebook</a></li>
                <li><a href="#" class="twt">twitter</a></li>
                <li><a href="#" class="gpls">google</a></li>
                <div class="clearfix"></div>
            </ul>
        </div>
        <div class="col-md-2 re-ft-grd">
            <div class="bt-logo">
                <div class="logo">
                    <a href="index" class="ft-log">ADIDAS</a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="copy-rt">
    <div class="container">
        <p>&copy; 2023 ADIDAS All Rights Reserved.</p>
    </div>
</div>
