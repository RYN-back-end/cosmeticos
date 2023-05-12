<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">قائمة الصفحات</li>


                <li>
                    <a href="{{route('adminHome')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-home">الرئيسية</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-dashboards">المشرفين</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admins.index')}}" key="t-admins"> قائمة المشرفين</a></li>
                        <li><a href="{{route('admins.create')}}" class="create-model" key="t-default"> اضافة مشرف</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-shopping-bag"></i>
                        <span key="t-dashboards">المنتجات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('products.index')}}" key="t-products"> قائمة المنتجات</a></li>
                        <li><a href="{{route('products.create')}}" class="create-model" key="t-product"> اضافة منتج</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-images"></i>
                        <span key="t-dashboards">البانر المتحرك</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('sliders.index')}}" key="t-sliders"> عرض الكل</a></li>
                        <li><a href="{{route('sliders.create')}}" class="create-model" key="t-product"> اضافة جديد</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('contacts.index')}}" class="waves-effect">
                        <i class="bx bx-message"></i>
                        <span key="t-Contacts">طلبات التواصل</span>
                    </a>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
