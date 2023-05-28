@extends('frontend.frontend_master')
@section('frontend_content')
    <!-- contact -->
    <div class="contact">
        <div class="container">
            <h3>Catch us</h3>
            <div class="contact-content">
                <form action=" {{ route('contact.process') }} " method="post">
                    @csrf
                    <h4>Name</h4>
                    <input type="text" class="textbox" name="nama" ><br>
                    <h4>Email</h4>
                    <input type="email" class="textbox" name="email" ><br>
                    <div class="clear"> </div>
                    <div>
                        <textarea name="isi" >Your Message</textarea><br>
                    </div>
                    <div class="submit">
                        <button>SUBMIT</button>
                    </div>
                </form>
                <div class="map">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.135670863288!2d98.64405097251587!3d3.556200942622448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312fe8a239f933%3A0xee7315636ea2fcfa!2sGg.%20Famili%20No.1%2C%20Padang%20Bulan%20Selayang%20I%2C%20Kec.%20Medan%20Selayang%2C%20Kota%20Medan%2C%20Sumatera%20Utara%2020155!5e0!3m2!1sid!2sid!4v1684160634448!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><br>
            </div>
        </div>
    </div>
@endsection
