<header class="header axil-header header-style-1">
    <div class="header-top-campaign">
        <div class="container position-relative">
            <div class="campaign-content">
                <p>شحن مجاني للمنتجات فوق 350 ج.م <a href="#">عرض المنتجات</a></p>
            </div>
        </div>
        <button class="remove-campaign"><i class="fal fa-times"></i></button>
    </div>

    <!-- Start Mainmenu Area  -->
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-brand">
                    <a href="{{route('/')}}" class="logo logo-dark">
                        <img src="{{asset($setting->logo)}}" alt="Site Logo" style="width: 150px;height: 50px">
                    </a>
                    <a href="{{route('/')}}" class="logo logo-light">
                        <img src="{{asset($setting->logo)}}" alt="Site Logo" style="width: 150px;height: 50px">
                    </a>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="{{route('/')}}" class="logo">
                                <img src="{{asset($setting->logo)}}" alt="Site Logo" style="width: 150px;height: 50px">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li><a href="{{route('/')}}">الرئيسية</a></li>
                            <li><a href="{{route('productPage')}}">المنتجات</a></li>
                            <li><a href="{{route('blogs')}}">المقالات</a></li>
                            <li><a href="{{route('about')}}">من نحن</a></li>
                            <li><a href="{{route('contactUs')}}">تواصل معنا</a></li>
                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <div class="header-action">
                    <ul class="action-list">
{{--                        <li class="axil-search">--}}
{{--                            <a href="javascript:void(0)" class="header-search-icon" title="Search">--}}
{{--                                <i class="flaticon-magnifying-glass"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="wishlist">--}}
{{--                            <a href="wishlist.html">--}}
{{--                                <i class="flaticon-heart"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="shopping-cart">--}}
{{--                            <a href="#" class="cart-dropdown-btn">--}}
{{--                                <span class="cart-count">3</span>--}}
{{--                                <i class="flaticon-shopping-cart"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="my-account">--}}
{{--                            <a href="javascript:void(0)">--}}
{{--                                <i class="flaticon-person"></i>--}}
{{--                            </a>--}}
{{--                            <div class="my-account-dropdown">--}}
{{--                                <span class="title">QUICKLINKS</span>--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="my-account.html">My Account</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Initiate return</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Support</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Language</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <div class="login-btn">--}}
{{--                                    <a href="sign-in.html" class="axil-btn btn-bg-primary">Login</a>--}}
{{--                                </div>--}}
{{--                                <div class="reg-footer text-center">No account yet? <a href="sign-up.html" class="btn-link">REGISTER HERE.</a></div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
