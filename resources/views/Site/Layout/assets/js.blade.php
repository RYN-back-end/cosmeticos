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
        $(".loader-container").fadeOut("slow");
    });

    // subscribeForm
    $("form#subscribeForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $('#subscribeForm').attr('action');
        $.ajax({
            url:url,
            type: 'POST',
            data: formData,
            beforeSend: function(){
                $('#sendBtn').html('<span style="margin-right: 4px;color: white"> انتظر.. </span><span class="spinner-border spinner-border-sm text-light" ' + ' ></span>');
            },
            complete: function(){


            },
            success: function (data) {
                if (data.status == 200){
                    toastr.success('تم الاشتراك بنجاح, سنرسل لك احدث العروض والاخبار ❤️');
                    $('#subscribeForm')[0].reset();
                    $('#sendBtn').html("اشتراك").attr('disabled', false);
                }
                else if (data.status == 405) {
                    toastr.warning('لقد قمت بالتسجيل مسبقا, سنرسل لك احدث العروض والاخبار ❤️');
                    $('#subscribeForm')[0].reset();
                    $('#sendBtn').html("اشتراك").attr('disabled', false);
                }
                else {
                    toastr.error('عذرا هناك خطأ فني 😞');
                }
            },
            error: function (data) {
                if (data.status == 500) {
                    $('#sendBtn').html("اشتراك").attr('disabled', false);
                    toastr.error('عذرا هناك خطأ فني 😞');
                }
                else if (data.status == 422) {
                    $('#sendBtn').html("اشتراك").attr('disabled', false);
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                toastr.error(value);
                            });
                        }
                    });
                }
            },//end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });

</script>




@yield('site-js')
