@extends('Admin.Layout.app')
@section('title')
    الاعدادات
@endsection
@section('pageName')
    الاعدادات
@endsection
@section('content')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <div class="row">
        <div class="col-xl-12">
            <form action="{{route('settingUpdate')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">لوجو الموقع</h4>
                        <div class="mb-3 h-25">
                            <label class="form-label">اللوجو ( يفضل ان يكون بحجم عرض 150 × 50 طول px)</label>
                            <input type="file" class="dropify" name="logo"
                                   data-default-file="{{getFile(($setting->logo) ?? '')}}"
                                   accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
                            <span class="form-text text-info">مسموح فقط بـ: png, gif, jpeg, jpg, webp</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">عن المتجر</h4>
                        <div class="mb-3 h-25">
                            <label class="form-label">تظهر في صفحة من نحن ( يفضل ان يكون بحجم عرض 410 × 489 طول px)</label>
                            <input type="file" class="dropify" name="about_image"
                                   data-default-file="{{getFile(($setting->about_image) ?? '')}}"
                                   accept="image/png, image/gif, image/jpeg,image/jpg, image/webp"/>
                            <span class="form-text text-info">مسموح فقط بـ: png, gif, jpeg, jpg, webp</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">معلومات اضافية</h4>
                        <div class="mb-3">
                            <label for="Title">اسم المتجر</label>
                            <input id="Title" name="title" type="text" class="form-control" required
                                   value="{{($setting->title) ?? ''}}">
                        </div>
                        <div class="mb-3">
                            <label for="blog">عن متجرنا او من نحن</label>
                            <textarea id="blog" name="about" required>{!! ($setting->about) ?? '' !!}</textarea>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">تحديث</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- end row -->

@endsection
@section('dashboard-js')
    <script>
        $('.dropify').dropify("Upload Here");
        CKEDITOR.replace('blog');
    </script>
@endsection
