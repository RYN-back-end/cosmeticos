<!-- Modernizer JS -->
<script src="{{asset('assets/site')}}/js/vendor/modernizr.min.js"></script>
<!-- jQuery JS -->
<script src="{{asset('assets/site')}}/js/vendor/jquery.js"></script>
<!-- Bootstrap JS -->
<script src="{{asset('assets/site')}}/js/vendor/popper.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/bootstrap.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/slick.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/js.cookie.js"></script>
<!-- <script src="{{asset('assets/site')}}/js/vendor/jquery.style.switcher.js"></script> -->
<script src="{{asset('assets/site')}}/js/vendor/jquery-ui.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/jquery.countdown.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/sal.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/jquery.magnific-popup.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/isotope.pkgd.min.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/counterup.js"></script>
<script src="{{asset('assets/site')}}/js/vendor/waypoints.min.js"></script>

<!-- Main JS -->
<script src="{{asset('assets/site')}}/js/rtl-main.js"></script>

<!-- Dropify Js -->
<script src="{{asset('assets/main')}}/dropify/dropify.min.js"></script>

<!-- Toastr Js -->
<script src="{{asset('assets/main')}}/toastr/toastr.min.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(window).on('load', function() {
        $('#loader-overlay').fadeOut('slow');
    });
</script>


@yield('site-js')
