@extends('Site.Layout.app')
@section('content')

    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="{{route('/')}}">الرئيسية</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item active" aria-current="page">المنتجات</li>
                        </ul>
                        <h1 class="title">كل المنتجات</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="inner">
                        <div class="bradcrumb-thumb">
                            <img src="{{asset('assets')}}/uploads/product.png" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->
    <!-- Start Shop Area  -->
    <div class="axil-shop-area axil-section-gap bg-color-white">
        <div class="container">
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="axil-shop-top">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-9">--}}
{{--                                <div class="category-select">--}}

{{--                                    <!-- Start Single Select  -->--}}
{{--                                    <select class="single-select">--}}
{{--                                        <option>Categories</option>--}}
{{--                                        <option>Fashion</option>--}}
{{--                                        <option>Electronics</option>--}}
{{--                                        <option>Furniture</option>--}}
{{--                                        <option>Beauty</option>--}}
{{--                                    </select>--}}
{{--                                    <!-- End Single Select  -->--}}

{{--                                    <!-- Start Single Select  -->--}}
{{--                                    <select class="single-select">--}}
{{--                                        <option>Color</option>--}}
{{--                                        <option>Red</option>--}}
{{--                                        <option>Blue</option>--}}
{{--                                        <option>Green</option>--}}
{{--                                        <option>Pink</option>--}}
{{--                                    </select>--}}
{{--                                    <!-- End Single Select  -->--}}

{{--                                    <!-- Start Single Select  -->--}}
{{--                                    <select class="single-select">--}}
{{--                                        <option>Price Range</option>--}}
{{--                                        <option>0 - 100</option>--}}
{{--                                        <option>100 - 500</option>--}}
{{--                                        <option>500 - 1000</option>--}}
{{--                                        <option>1000 - 1500</option>--}}
{{--                                    </select>--}}
{{--                                    <!-- End Single Select  -->--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3">--}}
{{--                                <div class="category-select mt_md--10 mt_sm--10 justify-content-lg-end">--}}
{{--                                    <!-- Start Single Select  -->--}}
{{--                                    <select class="single-select">--}}
{{--                                        <option>Sort by Latest</option>--}}
{{--                                        <option>Sort by Name</option>--}}
{{--                                        <option>Sort by Price</option>--}}
{{--                                        <option>Sort by Viewed</option>--}}
{{--                                    </select>--}}
{{--                                    <!-- End Single Select  -->--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row row--15">
                @foreach($products as $product)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="axil-product product-style-one has-color-pick mt--40">
                            <div class="thumbnail">
                                <a href="{{route('productDetails',$product->title)}}">
                                    <img src="{{getFile($product->image)}}" style="height: 300px;width: 300px" alt="Product Images">
                                </a>
                                    @if($product->price_after && $product->price_after != 0)
                                            <?php
                                            $discountPercent = (($product->price_before - $product->price_after) / $product->price_before) * 100;
                                            ?>
                                        <div class="label-block label-right">
                                            <div class="product-badget">خصم {{round($discountPercent,0)}} %  </div>
                                        </div>

                                    @endif
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option">
                                            <a href="{{route('productDetails',$product->title)}}">
                                                عرض التفاصيل
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <div class="product-rating">
                                                <span class="icon">
                                                       @for ($i = 1; $i <= $product->stars; $i++)
                                                        <i class='fas fa-star text-warning'></i>
                                                    @endfor
                                                    @for ($i = 5; $i > $product->stars; $i--)
                                                        <i class='fal fa-star text-warning'></i>
                                                    @endfor
                                        </span>
                                        <span class="rating-number">({{$product->reviews_num}})</span>
                                    </div>
                                    <h5 class="title"><a href="{{route('productDetails',$product->title)}}  ">{{\Illuminate\Support\Str::limit($product->title,35)}}</a></h5>
                                    <div class="product-price-variant">
                                        @if($product->price_after && $product->price_after != 0)
                                            <span class="price old-price">{{$product->price_before}} ج م</span>
                                            <b>{{$product->price_after}} ج م</b></h5>
                                        @else
                                            <b>{{$product->price_before}} ج م</b></h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                @endforeach
            </div>
            <div class="text-center pt--30">
                {{ $products->links('pagination::bootstrap-4', ['class' => 'my-pagination-class']) }}
{{--                <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>--}}
            </div>
        </div>
        <!-- End .container -->
    </div>
    <!-- End Shop Area  -->

    @include('Site.Layout.Sections.subscribe')



@endsection

