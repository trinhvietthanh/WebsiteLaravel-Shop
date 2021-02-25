<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | B-Shopper</title>
    <link href="{{asset('public/Front-End/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/Front-End/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/Front-End/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/Front-End/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/Front-End/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/Front-End/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/Front-End/css/responsive.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('public/Front-End/css/style.css')}}" rel="stylesheet"> --}}
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('public/Front-End/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/Front-Endimages/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/Front-Endimages/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/Front-Endimages/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('public/Front-Endimages/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>


    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        
                            <div class="companyinfo">
                                <h2><span>Books</span>-shopper</h2>
    
                            </div>
                    
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">

                                <li><a href="{{url('/gio-hang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                @guest
                                    <li><a href="{{ route('login') }}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                @else
                                <li class="dropdown"><a href="{{url('/login-checkout')}}"><i class="fa fa-user"></i> {{Auth::user()->name}}</a>
                                    <ul role="menu" class="sub-menu">
                                    	
																					<li><a href="#"></a>Admin</li>
																					<br />
																					<li><a href="#"></a>Thông tin tài khoản</li>
																					<br />
																					<li><a href="{{url('/order-history')}}"></a>Lịch sử giao dịch</li>
                                    </ul>
																</li>
                                @endguest

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{url('/trang-chu')}}" class="active">Trang chủ</a></li>
                                @foreach($category as $key=>$cate)
                                <li class="dropdown"><a href="{{url('/the-loai/'.$cate->slug)}}">{{$cate->name}}<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($categorySon as $son)
                                            @if($son->category_parent == $cate->id)
                                                <li><a href="{{url('/the-loai/'.$son->slug)}}">{{$son->name}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach


                                </li>


                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search"/>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

   

    <section>
        <div class="container">


                <div class="col-sm-12 padding-right">
                    @yield('content')

                </div>

        </div>
    </section>

    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>Books</span>-shopper</h2>

                        </div>
                    </div>

                        <div class="col-sm-7">

                        </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="{{('public/Front-End/images/home/map.png')}}" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>




<script src="/js/app.js"></script>
    <script src="{{asset('public/Front-End/js/jquery.js')}}"></script>
    <script src="{{asset('public/Front-End/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/Front-End/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/Front-End/js/price-range.js')}}"></script>
    <script src="{{asset('public/Front-End/js/jquer.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/Front-End/js/main.js')}}"></script>
</body>
</html>
