<!-- Start Axil Newsletter Area  -->
<div class="axil-newsletter-area axil-section-gap pt--0">
    <div class="container">
        <div class="etrade-newsletter-wrapper bg_image bg_image--5">
            <div class="newsletter-content">
                <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>اخبارنا</span>
                <h2 class="title mb--40 mb_sm--30">اطلع علي كل ما هو جديد</h2>
                <div class="input-group newsletter-form">
                    <form id="subscribeForm" method="POST" action="{{route('postSubscribe')}}">
                        @csrf
                        <div class="position-relative newsletter-inner mb--15">
                            <input name="email" placeholder="example@gmail.com" type="email">
                        </div>
                        <button type="submit" id="sendBtn" class="axil-btn mb--15">اشتراك</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End .container -->
</div>
<!-- End Axil Newsletter Area  -->

