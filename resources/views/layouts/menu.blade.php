<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    {{--                <li class="header">MAIN NAVIGATION</li>--}}
    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('home')}}"><i class="fa fa-circle-o"></i> Dashboard</a></li>
            <li><a href="{{url('settings')}}"><i class="fa fa-circle-o"></i> Settings</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-user"></i> <span>المستخدمين</span>
            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url(route('user.index'))}}"><i class="fa fa-user"></i> المستخدمين</a></li>
            <li><a href="{{url(route('user.create'))}}"><i class="fa fa-plus"></i> اضافة</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-list"></i> <span>رتب المستخدمين</span>
            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url(route('role.index'))}}"><i class="fa fa-list"></i> رتب المستخدمين</a></li>
            <li><a href="{{url(route('role.create'))}}"><i class="fa fa-plus"></i> اضافة</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-list"></i> <span>Governorate</span>
            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url(route('governorate.index'))}}"><i class="fa fa-list"></i> Governorates</a></li>
            <li><a href="{{url(route('governorate.create'))}}"><i class="fa fa-plus"></i> Add</a></li>
        </ul>
    </li>


    <li class="treeview">
        <a href="#">
            <i class="fa fa-list"></i> <span>City</span>
            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url(route('city.index'))}}"><i class="fa fa-list"></i> Cities</a></li>
            <li><a href="{{url(route('city.create'))}}"><i class="fa fa-plus"></i> Add</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-list"></i> <span>Category</span>
            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url(route('category.index'))}}"><i class="fa fa-list"></i> Categories</a></li>
            <li><a href="{{url(route('category.create'))}}"><i class="fa fa-plus"></i> Add</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-list"></i> <span>Post</span>
            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url(route('post.index'))}}"><i class="fa fa-list"></i> Posts</a></li>
            <li><a href="{{url(route('post.create'))}}"><i class="fa fa-plus"></i> Add</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-list"></i> <span>Donation Request</span>
            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url(route('donation.index'))}}"><i class="fa fa-list"></i> Donations Request</a></li>
        </ul>
    </li>

    <li>
        <a href="{{url(route('contact.index'))}}"><i class="fa fa-circle-o text-red"></i> <span>Contact Us</span></a>
    </li>

    <li>
        <a href="{{url(route('client.index'))}}"><i class="fa fa-user text-red"></i> <span>Client</span></a>
    </li>

    <li>
        <a href="{{url(route('getChangePassword'))}}"><i class="fa fa-pinterest-p text-red"></i> <span>Change Password</span></a>
    </li>

</ul>
