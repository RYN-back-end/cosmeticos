@extends('Admin.Layout.app')
@section('title')
    تفاصيل المنتج
@endsection
@section('pageName')
    تفاصيل المنتج
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="product-detai-imgs">
                                <div class="row">
                                    <div class="col-md-2 col-sm-3 col-4">
                                        <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist"
                                             aria-orientation="vertical">
                                            <a class="nav-link active" id="product-{{$product->id}}-tab"
                                               data-bs-toggle="pill" href="#product-{{$product->id}}" role="tab"
                                               aria-controls="product-1" aria-selected="true">
                                                <img src="{{getFile($product->image)}}" alt=""
                                                     class="img-fluid mx-auto d-block rounded">
                                            </a>
                                            @foreach($product->images as $rowImage)
                                                <a class="nav-link" id="product-{{$rowImage->id}}-tab"
                                                   data-bs-toggle="pill" href="#product-{{$rowImage->id}}" role="tab"
                                                   aria-controls="product-2" aria-selected="false">
                                                    <img src="{{getFile($rowImage->image)}}" alt=""
                                                         class="img-fluid mx-auto d-block rounded">
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="product-{{$product->id}}"
                                                 role="tabpanel" aria-labelledby="product-{{$product->id}}-tab">
                                                <div>
                                                    <img src="{{getFile($product->image)}}" alt=""
                                                         class="img-fluid mx-auto d-block">
                                                </div>
                                            </div>
                                            @foreach($product->images as $rowImage)
                                                <div class="tab-pane fade" id="product-{{$rowImage->id}}"
                                                     role="tabpanel" aria-labelledby="product-{{$rowImage->id}}-tab">
                                                    <div>
                                                        <img src="{{getFile($rowImage->image)}}" alt=""
                                                             class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="text-center">
                                            <button type="button"
                                                    class="btn btn-primary waves-effect waves-light mt-2 me-1">
                                                <i class="bx bx-cart me-2"></i> Add to cart
                                            </button>
                                            <button type="button"
                                                    class="btn btn-success waves-effect  mt-2 waves-light">
                                                <i class="bx bx-shopping-bag me-2"></i>Buy now
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="mt-4 mt-xl-3">
                                {{--                                <a href="javascript: void(0);" class="text-primary">Headphone</a>--}}
                                <h4 class="mt-1 mb-3">{{$product->title}}</h4>

                                <p class="text-muted float-start me-3">
                                    @for ($i = 1; $i <= $product->stars; $i++)
                                        <i class='bx bxs-star text-warning'></i>
                                    @endfor
                                    @for ($i = 5; $i > $product->stars; $i--)
                                        <i class='bx bx-star text-warning'></i>
                                    @endfor
                                </p>
                                <p class="text-muted mb-4">( {{$product->reviews_num}} مراجعات )</p>

                                @if($product->price_after)
                                    <?php
                                        $discountPercent = (($product->price_before - $product->price_after) / $product->price_before) * 100;
                                        ?>
                                    <h6 class="text-success text-uppercase">خصم {{round($discountPercent,0)}} %  </h6>
                                @endif
                                <h5 class="mb-4">السعر :
                                    @if($product->price_after)
                                        <span class="text-muted me-2"><del>{{$product->price_before}} ج م</del></span>
                                    @endif
                                    <b>{{$product->price_after}} ج م</b></h5>
                                <p class="text-muted mb-4">
                                    {{$product->desc}}
                                </p>
{{--                                <div class="row mb-3">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div>--}}
{{--                                            <p class="text-muted"><i--}}
{{--                                                    class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i>--}}
{{--                                                Wireless</p>--}}
{{--                                            <p class="text-muted"><i--}}
{{--                                                    class="bx bx-shape-triangle font-size-16 align-middle text-primary me-1"></i>--}}
{{--                                                Wireless Range : 10m</p>--}}
{{--                                            <p class="text-muted"><i--}}
{{--                                                    class="bx bx-battery font-size-16 align-middle text-primary me-1"></i>--}}
{{--                                                Battery life : 6hrs</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div>--}}
{{--                                            <p class="text-muted"><i--}}
{{--                                                    class="bx bx-user-voice font-size-16 align-middle text-primary me-1"></i>--}}
{{--                                                Bass</p>--}}
{{--                                            <p class="text-muted"><i--}}
{{--                                                    class="bx bx-cog font-size-16 align-middle text-primary me-1"></i>--}}
{{--                                                Warranty : 1 Year</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="product-color">
                                    <h5 class="font-size-15">صور المنتج</h5>
                                    <a href="javascript: void(0);" class="active">
                                        <div class="product-color-item border rounded">
                                            <img src="{{getFile($product->image)}}" onclick="window.open(this.src)" alt="" class="avatar-md">
                                        </div>
                                        <p>الصورة الرئيسية</p>
                                    </a>
                                    @foreach($product->images as $rowImage)
                                        <a href="javascript: void(0);" id="productImage{{$rowImage->id}}">
                                            <div class="product-color-item border rounded">
                                                <img src="{{getFile($rowImage->image)}}" onclick="window.open(this.src)" alt="" class="avatar-md">
                                            </div>
                                            <button class="btn btn-danger deleteBtn"  data-id="{{$rowImage->id}}">حذف </button>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

{{--                    <div class="mt-5">--}}
{{--                        <h5 class="mb-3">Specifications :</h5>--}}

{{--                        <div class="table-responsive">--}}
{{--                            <table class="table mb-0 table-bordered">--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row" style="width: 400px;">Category</th>--}}
{{--                                    <td>Headphone</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">Brand</th>--}}
{{--                                    <td>JBL</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">Color</th>--}}
{{--                                    <td>Black</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">Connectivity</th>--}}
{{--                                    <td>Bluetooth</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">Warranty Summary</th>--}}
{{--                                    <td>1 Year</td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- end Specifications -->

                    <div class="mt-5">
                        <h5>المراجعات والتعليقات :</h5>

                        <div class="d-flex py-3 border-bottom">
                            <div class="flex-shrink-0 me-3">
                                <img src="{{asset("assets/admin")}}/images/users/avatar-2.jpg" class="avatar-xs rounded-circle" alt="img"/>
                            </div>

                            <div class="flex-grow-1">
                                <h5 class="mb-1 font-size-15">Brian</h5>
                                <p class="text-muted">If several languages coalesce, the grammar of the resulting
                                    language.</p>
                                <ul class="list-inline float-sm-end mb-sm-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"><i class="far fa-thumbs-up me-1"></i> Like</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"><i class="far fa-comment-dots me-1"></i> Comment</a>
                                    </li>
                                </ul>
                                <div class="text-muted font-size-12"><i
                                        class="far fa-calendar-alt text-primary me-1"></i> 5 hrs ago
                                </div>
                            </div>
                        </div>
                        <div class="d-flex py-3 border-bottom">
                            <div class="flex-shrink-0 me-3">
                                <img src="{{asset("assets/admin")}}/images/users/avatar-4.jpg" class="avatar-xs rounded-circle" alt="img"/>
                            </div>

                            <div class="flex-grow-1">
                                <h5 class="font-size-15 mb-1">Denver</h5>
                                <p class="text-muted">To an English person, it will seem like simplified English, as a
                                    skeptical Cambridge</p>
                                <ul class="list-inline float-sm-end mb-sm-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"><i class="far fa-thumbs-up me-1"></i> Like</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"><i class="far fa-comment-dots me-1"></i> Comment</a>
                                    </li>
                                </ul>
                                <div class="text-muted font-size-12"><i
                                        class="far fa-calendar-alt text-primary me-1"></i> 07 Oct, 2019
                                </div>
                                <div class="d-flex mt-4">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="{{asset("assets/admin")}}/images/users/avatar-5.jpg"
                                             class="avatar-xs me-3 rounded-circle" alt="img"/>
                                    </div>

                                    <div class="flex-grow-1">
                                        <h5 class="mb-1 font-size-15">Henry</h5>
                                        <p class="text-muted">Their separate existence is a myth. For science, music,
                                            sport, etc.</p>
                                        <ul class="list-inline float-sm-end mb-sm-0">
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);"><i class="far fa-thumbs-up me-1"></i>
                                                    Like</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript: void(0);"><i class="far fa-comment-dots me-1"></i>
                                                    Comment</a>
                                            </li>
                                        </ul>
                                        <div class="text-muted font-size-12"><i
                                                class="far fa-calendar-alt text-primary me-1"></i> 08 Oct, 2019
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex py-3 border-bottom">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-xs">
                                                        <span
                                                            class="avatar-title bg-primary bg-soft text-primary rounded-circle font-size-16">
                                                            N
                                                        </span>
                                </div>
                            </div>

                            <div class="flex-grow-1">
                                <h5 class="mb-1 font-size-15">Neal</h5>
                                <p class="text-muted">Everyone realizes why a new common language would be
                                    desirable.</p>
                                <ul class="list-inline float-sm-end mb-sm-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"><i class="far fa-thumbs-up me-1"></i> Like</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"><i class="far fa-comment-dots me-1"></i> Comment</a>
                                    </li>
                                </ul>
                                <div class="text-muted font-size-12"><i
                                        class="far fa-calendar-alt text-primary me-1"></i> 05 Oct, 2019
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->

    <div class="row mt-3">
        <div class="col-lg-12">
            <div>
                <h5 class="mb-3">منتجات متعلقة</h5>

                <div class="row">
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <img src="{{asset("assets/admin")}}/images/product/img-7.png" alt=""
                                             class="img-fluid mx-auto d-block">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="text-center text-md-start pt-3 pt-md-0">
                                            <h5 class="text-truncate"><a href="javascript: void(0);" class="text-dark">Wireless
                                                    Headphone</a></h5>
                                            <p class="text-muted mb-4">
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star"></i>
                                            </p>
                                            <h5 class="my-0"><span class="text-muted me-2"><del>$240</del></span> <b>$225</b>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <img src="{{asset("assets/admin")}}/images/product/img-4.png" alt=""
                                             class="img-fluid mx-auto d-block">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="text-center text-md-start pt-3 pt-md-0">
                                            <h5 class="text-truncate"><a href="javascript: void(0);" class="text-dark">Phone
                                                    patterned cases</a></h5>
                                            <p class="text-muted mb-4">
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star"></i>
                                            </p>
                                            <h5 class="my-0"><span class="text-muted me-2"><del>$150</del></span> <b>$145</b>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <img src="{{asset("assets/admin")}}/images/product/img-6.png" alt=""
                                             class="img-fluid mx-auto d-block">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="text-center text-md-start pt-3 pt-md-0">

                                            <h5 class="text-truncate"><a href="javascript: void(0);" class="text-dark">Phone
                                                    Dark Patterned cases</a></h5>
                                            <p class="text-muted mb-4">
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star"></i>
                                            </p>
                                            <h5 class="my-0"><span class="text-muted me-2"><del>$138</del></span> <b>$135</b>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
@section('dashboard-js')
<script>
    $(document).on('click', '.deleteBtn', function () {
        var id = $(this).data('id');
        swal.fire({
            title: "حذف صورة",
            text: "هل انت متأكد من حذف صورة المنتج ؟",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#dc5339",
            confirmButtonText: "نعم, احذف !",
            cancelButtonText: "تراجع",
            okButtonText: "اضافة",
            closeOnConfirm: false
        }).then((result) => {
            if (!result.isConfirmed) {
                return true;
            }
            var url = '{{ route("products.deleteImage",":id") }}';
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: 'DELETE',
                beforeSend: function () {
                    $('#loader-overlay').show()
                },
                success: function (data) {

                    window.setTimeout(function () {
                        $('#loader-overlay').hide()
                        if (data.status == 200) {
                            toastr.success((data.message) ?? 'تم حذف البيانات بنجاح')
                            $(`#productImage${data.id}`).fadeOut();
                            $(`#product-${data.id}`).fadeOut();
                            $(`#product-${data.id}-tab`).fadeOut();
                        }
                        else
                            toastr.error('عذرا هناك خطأ فني 😞');
                    }, 300);
                }, error: function (data) {

                    if (data.status === 500) {
                        toastr.error('عذرا هناك خطأ فني 😞');
                    }
                    if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error(value)
                                });
                            }
                        });
                    }
                }

            });
        });
    });
</script>
@endsection


