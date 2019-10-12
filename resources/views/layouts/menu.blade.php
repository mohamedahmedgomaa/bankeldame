<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    {{--                <li class="header">MAIN NAVIGATION</li>--}}
    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span> الصفحه الرئيسيه</span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url(route('home'))}}"><i class="fa fa-circle-o"></i> الصفحه الرئيسيه</a></li>
            <li><a href="{{url(route('settings'))}}"><i class="fa fa-circle-o"></i> الاعدادات</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-user"></i> <span>المستخدمين</span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url(route('user.index'))}}"><i class="fa fa-user"></i> المستخدمين</a></li>
            <li><a href="{{url(route('user.create'))}}"><i class="fa fa-plus"></i> اضافة</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-list"></i> <span>رتب المستخدمين</span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url(route('role.index'))}}"><i class="fa fa-list"></i> رتب المستخدمين</a></li>
            <li><a href="{{url(route('role.create'))}}"><i class="fa fa-plus"></i> اضافة</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-map-marker"></i> <span>المحافظات</span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url(route('governorate.index'))}}"><i class="fa fa-map-marker"></i> المحافظات</a></li>
            <li><a href="{{url(route('governorate.create'))}}"><i class="fa fa-plus"></i> اضافه</a></li>
        </ul>
    </li>


    <li class="treeview">
        <a href="#">
            <i class="fa fa-flag-o"></i> <span>المدن</span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url(route('city.index'))}}"><i class="fa fa-flag-o"></i> المدن</a></li>
            <li><a href="{{url(route('city.create'))}}"><i class="fa fa-plus"></i> اضافه</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-filter"></i> <span>الاقسام</span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url(route('category.index'))}}"><i class="fa fa-filter"></i> الاقسام</a></li>
            <li><a href="{{url(route('category.create'))}}"><i class="fa fa-plus"></i> اضافه</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa fa-comments"></i> <span>المقالات</span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url(route('post.index'))}}"><i class="fa fa-comments-o"></i> المقالات</a></li>
            <li><a href="{{url(route('post.create'))}}"><i class="fa fa-plus"></i> اضافه</a></li>
        </ul>
    </li>

    <li>
        <a href="{{url(route('donation.index'))}}"><i class="fa fa-heart text-red"></i> <span>التبرعات</span></a>
    </li>

    <li>
        <a href="{{url(route('contact.index'))}}"><i class="fa fa-phone text-red"></i> <span>تواصل معنا</span></a>
    </li>

    <li>
        <a href="{{url(route('client.index'))}}"><i class="fa fa-user text-red"></i> <span>العملاء</span></a>
    </li>

    <li>
        <a href="{{url(route('getChangePassword'))}}"><i class="fa fa-map-pin text-red"></i> <span>تغيير كلمه المرور</span></a>
    </li>

</ul>
