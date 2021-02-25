
<!DOCTYPE html>
<head>
@yield('title')
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/Back-End/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/Back-end/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/Back-end/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/Back-end/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/Back-End/css/font-awesome.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('public/Back-end/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/Back-end/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('public/Back-end/js/jquery2.0.3.min.js')}}"></script>

<script src="{{asset('public/Back-end/js/raphael-min.js')}}"></script>
<script src="{{asset('public/Back-end/js/morris.js')}}"></script>

</head>
<body>
@include('ckfinder::setup')
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="/" class="logo">
        TRANG CHỦ
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->

        <!-- settings end -->

    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset('public/Back-end/images/thanh.png')}}">
                <span class="username">
                    <?php
                        $name =Session::get('admin_name');
                        if($name){
                            echo $name;

                        }
                    ?>
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                 @guest
                 @else
                    <li><a href="#"><i class=" fa fa-suitcase"></i>Thông tin</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    <i class="fa fa-key"></i> {{ __('Đăng xuất') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest

            </ul>
        </li>
        <!-- user login dropdown end -->

    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                <a class="active" href="{{url('/dashborad')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>
                @can('review_category')
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-bookmark"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
                    <li><a href="{{url('/add-category')}}">Thêm danh mục</a></li>
					<li><a href="{{url('/all-category')}}">Liệt kê danh mục</a></li>

                    </ul>
                </li>
                @endcan
                @can('view_author')
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="	fa fa-paint-brush"></i>
                        <span>Tác giả</span>
                    </a>
                    <ul class="sub">
                    <li><a href="{{url('/add-author')}}">Thêm tác giả</a></li>
					<li><a href="{{url('/all-author')}}">Liệt kê các tác giả</a></li>

                    </ul>
                </li>
                @endcan
                @can('view_publisher')
                <li class="sub-menu">
                    <a href="{{url('admin/publisher')}}">
                        <i class="  fa fa-book"></i>
                        <span>Nhà xuất bản</span>
                    </a>
                </li>
                @endcan
                @can('view_stock')
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="	fa fa-archive"></i>
                        <span>Kho</span>
                    </a>
                    <ul class="sub">
                    <li><a href="{{url('/add-product')}}">Thêm sản phẩm</a></li>
					<li><a href="{{url('/all-product')}}">Kho</a></li>

                    </ul>
                </li>
                @endcan
                @can('view_bill')
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-file-text"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
                    <li><a href="{{url('admin/order')}}">Đơn hàng chưa chốt</a></li>
                    <li><a href="{{url('admin/order-done')}}">Đơn hàng đã giao</a></li>
					<li><a href="{{url('admin/bills')}}">Liệt kê các đơn hàng</a></li>

                    </ul>
                </li>
                @endcan
                @can('view_user')
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Quản lý người dùng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{url('/add_role_user')}}">
                            <i class="fa fa-universal-access"></i> Phân quyền</a></li>
                        <li><a href="{{url('/role_permission')}}">
                            <i class="fa fa-unlock-alt"></i>
                            Chức năng</a></li>
                        <li><a href="{{url('/list_user')}}">
                            <i class="fa fa-user"></i>Người dùng</a></li>
                    </ul>
                </li>
                @endcan
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
       @yield('admin_content')
    </section>

</section>

<!--main content end-->

<script src="{{asset('public/Back-end/js/bootstrap.js')}}"></script>
<script src="{{asset('public/Back-end/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/Back-end/js/scripts.js')}}"></script>
<script src="{{asset('public/Back-end/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/Back-end/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/Back-end/js/jquery.scrollTo.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'content', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
     CKEDITOR.replace( 'desc', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
</script>
@yield('script')

</body>
</html>
