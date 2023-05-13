 <!--shop-kart-js-->
 <script src="{{ asset('frontend') }}/assets/js/simpleCart.min.js"></script>
 <!--default-js-->
   <script src="{{ asset('frontend') }}/assets/js/jquery-2.1.4.min.js"></script>
 <!--bootstrap-js-->
   <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
 <!--script-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


 <script type="application/x-javascript"> addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

 <!-- FlexSlider -->
 <script src="{{ asset('frontend') }}/assets/js/imagezoom.js"></script>
 <script defer src="{{ asset('frontend') }}/assets/js/jquery.flexslider.js"></script>

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
 $('.flexslider').flexslider({
   animation: "slide",
   controlNav: "thumbnails"
 });
});
</script>
<!-- //FlexSlider-->

 {{-- untuk payment order card co--}}
 @yield('frontend_script')