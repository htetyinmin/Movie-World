<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page -->
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <!-- Mobile Specific -->
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicon -->
    <link href="{{asset('frontend_assets/images/favicon.png')}}" rel="shortcut icon" type="image/x-icon">
    <link href="{{asset('frontend_assets/images/favicon.png')}}" rel="icon" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="{{asset('frontend_assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Fontawesome Styles -->
    <link href="{{asset('frontend_assets/css/fontawesome.min.css')}}" rel="stylesheet">
    <!-- Iconfonts Styles -->
    <link href="{{asset('frontend_assets/css/icofont.css')}}" rel="stylesheet">
    <!-- Owl Carousel Styles -->
    <link href="{{asset('frontend_assets/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <!-- Slick Slider Styles -->
    <link href="{{asset('frontend_assets/css/slick.css')}}" rel="stylesheet">
    <link href="{{asset('frontend_assets/css/slick-theme.css')}}" rel="stylesheet">
    <!-- Swiper Slider Styles -->
    <link href="{{asset('frontend_assets/css/swiper.min.css')}}" rel="stylesheet">
    <!-- Animate Styles -->
    <link href="{{asset('frontend_assets/css/animate.css')}}" rel="stylesheet">
    <!-- Hover Styles -->
    <link href="{{asset('frontend_assets/css/hover-min.css')}}" rel="stylesheet">
    <!-- Magnific Styles -->
    <link href="{{asset('frontend_assets/css/magnific-popup.css')}}" rel="stylesheet">
    <!-- Bootstrap Datepicker Styles -->
    <link href="{{asset('frontend_assets/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <!-- Main Styles -->
    <link href="{{asset('frontend_assets/css/style.css')}}" rel="stylesheet">
    <!-- Responsive Styles -->
    <link href="{{asset('frontend_assets/css/responsive.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend_assets/css/custom.css')}}">

    <link rel="stylesheet" href="{{asset('frontend_assets/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('step-style.css') }}">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
    <style type="text/css">
        .form-control:focus{
            background-color: transparent !important;
            border-color: #ff0000 !important;
            color: #959595 !important;
        }
    </style>
</head>

<body>
    <!-- Start Preloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- Preloader End -->

    <div class="main" id="main">
        <!-- Start Mobile Header -->
        <header class="mobile-header">
            <div class="mobile-header-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-logo text-center">
                                <a href="index.html"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/mov.png')}}"></a>
                            </div>
                        </div>
                        <!-- Logo Col End -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Content End -->
        </header>
        <!-- Mobile Header End -->

        <!-- Start Header -->
        <header class="main-nav clearfix is-sticky">
            <div class="container-fluid">
                <div class="row justify-content-between">
                    <div class="col-lg-9 pl-0">
                        <!-- Start Navigation -->
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/mov.png')}}"></a>
                            <!-- Logo End -->
                            <div class="site-nav-inner float-left">
                                <button aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="fa fa-bars"></span></button> <!-- Navbar Toggler End -->
                                <div class="navbar-collapse navbar-responsive-collapse collapse" id="navbarSupportedContent">
                                    <ul class="nav navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="{{url('/')}}">Home</a>
                                        </li>
                                        <!-- Nav Item 1 End -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('/movielist')}}">Movies</a>
                                        </li>
                                        <!-- Nav Item 2 End -->
                                        <li class="nav-item dropdown">
                                            <a class="nav-link menu-dropdown" data-toggle="dropdown" href="#"> Genre <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu fade-up" role="menu">
                                                @foreach ($common[0] as $genre)
                                                <li>
                                                    <a class="dropdown-item" href="#">{{$genre->name}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <!-- Dropdown End -->
                                        </li>
                                        <!-- Nav Item 3 End -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('pricing')}}">Pricing</a>
                                        </li>
                                        <!-- Nav Item 4 End -->
                                    </ul>
                                    <!-- Nav UL End -->
                                </div>
                                <!-- Navbar Collapse End -->
                            </div>
                            <!-- Site Nav Inner End -->
                        </nav>
                        <!-- Navigation End -->
                    </div>
                    <!-- Col End -->
                    <div class="col-lg-3 text-right right-menu-wrap">
                        <ul class="nav d-flex align-items-center list-inline m-0 float-right">
                            <li class="nav-item">
                                <div class="nav-search">
                                    <a class="nav-link modal-popup" href="#search-popup"><i class="icofont-ui-search"></i></a>
                                </div>
                                <!-- Search Icon End -->
                            </li>
                            <li class="nav-item dropdown">
                                <div class="nav-notification">
                                    <a class="nav-link menu-dropdown" data-toggle="dropdown" href="#"><i class="icofont-notification"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right fade-up" role="menu">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="notification-card media">
                                                    <div class="notification-thumb"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/notify/thumb-1.jpg')}}"></div>
                                                    <!-- Notification thumb end -->
                                                    <div class="notification-content media-body">
                                                        <h2 class="notification-title">Iron Door</h2><span class="date"><i class="far fa-clock"></i> 1 min ago</span>
                                                    </div>
                                                    <!-- Notification Content end -->
                                                </div>
                                            </a>
                                        </li>
                                        <!-- Li 1 end -->
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="notification-card media">
                                                    <div class="notification-thumb"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/notify/thumb-2.jpg')}}"></div>
                                                    <!-- Notification thumb end -->
                                                    <div class="notification-content media-body">
                                                        <h2 class="notification-title">The Earth</h2><span class="date"><i class="far fa-clock"></i> 3 min ago</span>
                                                    </div>
                                                    <!-- Notification Content end -->
                                                </div>
                                            </a>
                                        </li>
                                        <!-- Li 2 end -->
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="notification-card media">
                                                    <div class="notification-thumb"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/notify/thumb-3.jpg')}}"></div>
                                                    <!-- Notification thumb end -->
                                                    <div class="notification-content media-body">
                                                        <h2 class="notification-title">City Dreams</h2><span class="date"><i class="far fa-clock"></i> 10 min ago</span>
                                                    </div>
                                                    <!-- Notification Content end -->
                                                </div>
                                            </a>
                                        </li>
                                        <!-- Li 3 end -->
                                    </ul>
                                    <!-- Notification List End -->
                                </div>
                                <!-- Notification End -->
                            </li>
                            <!-- Nav Item 4 End -->
                            <li class="nav-item">
                                <div class="nav-filter">
                                    <a class="nav-link openbtn" onclick="openNav()"><svg class="filter-animate" height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M24 14v-4c-1.619 0-2.906.267-3.705-1.476-.697-1.663.604-2.596 1.604-3.596l-2.829-2.828c-1.033 1.033-1.908 2.307-3.666 1.575-1.674-.686-1.404-2.334-1.404-3.675h-4c0 1.312.278 2.985-1.404 3.675-1.761.733-2.646-.553-3.667-1.574l-2.829 2.828c1.033 1.033 2.308 1.909 1.575 3.667-.348.849-1.176 1.404-2.094 1.404h-1.581v4c1.471 0 2.973-.281 3.704 1.475.698 1.661-.604 2.596-1.604 3.596l2.829 2.829c1-1 1.943-2.282 3.667-1.575 1.673.687 1.404 2.332 1.404 3.675h4c0-1.244-.276-2.967 1.475-3.704 1.645-.692 2.586.595 3.596 1.604l2.828-2.829c-1-1-2.301-1.933-1.604-3.595l.03-.072c.687-1.673 2.332-1.404 3.675-1.404zm-12 2c-2.209 0-4-1.791-4-4s1.791-4 4-4 4 1.791 4 4-1.791 4-4 4z"></path>
                                        </svg>
                                    </a>
                                </div>
                                <!-- Sidebar Filter Button End -->
                            </li>
                            <!-- Nav Item 2 End -->
                            <li class="nav-item">
                                <div class="nav-account ml-2">
                                    <div class="dropdown">
                                        <div aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" id="dropdown-account" role="button"><img alt="" class="img-fluid user-icon rounded-circle" src="{{asset('frontend_assets/images/avatar/user.jpg')}}"></div>
                                        <ul class="dropdown-menu dropdown-menu-right fade-up">
                                            @if (Auth::user())
                                            <li>
                                                <a href="" class="dropdown-item"><i class="fa fa-user mr-3"></i>{{ Auth::user()->name }}</a>
                                            </li>
                                            <li>
                                                <a href="" class="dropdown-item"><i class="fa fa-cogs mr-3"></i>Account Settings</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt mr-3"></i>Logout</a>
                                                
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                            @else
                                            <li>
                                                <a class="dropdown-item" href="{{url('/register')}}">
                                                    <i class="fas fa-user-plus mr-3"></i>
                                                    Register
                                                </a>
                                                <a class="dropdown-item" href="{{url('/login')}}">
                                                    <i class="fas fa-sign-in-alt mr-3"></i>
                                                    Login
                                                </a>
                                            </li>
											@endif
                                            <!-- Li 3 end -->
                                        </ul>
                                        <!-- Account List End -->
                                    </div>
                                    <!-- Account Drop Down End -->
                                </div>
                                <!-- Account Menu End -->
                            </li>
                            <!-- Nav Item 3 End -->
                        </ul>
                        <!-- Nav UL End -->
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </header>
        <!-- Header End -->


        <!-- Start Main Content -->
        @yield('content')
        <!-- Main Content End -->

        <!-- Start Footer Section -->
        <div class="main-footer">
            <div class="container-fluid">
                <div class="row justify-content-lg-between justify-content-center">
                    <div class="col-md-6">
                        <div class="footer-widget px-5">
                            <div class="widget-content">
                                <div class="footer-logo"><img alt="" class="img-fluid" src="{{asset('frontend_assets/images/mov.png')}}"></div>
                                <div class="footer-about-text">
                                    <p class="text-muted">Here , write the complete address of the Registered office address along with telephone number.</p>
                                </div>
                                <div class="footer-social-icons">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#" title="twitter"><i class="fab fa-2x fa-twitter"></i></a>
                                        </li>
                                        <!-- Social Icons Item 1 End -->
                                        <li class="list-inline-item">
                                            <a href="#" title="facebook"><i class="fab fa-2x fa-facebook-f"></i></a>
                                        </li>
                                        <!-- Social Icons Item 2 End -->
                                        <li class="list-inline-item">
                                            <a href="#" title="instagram"><i class="fab fa-2x fa-instagram"></i></a>
                                        </li>
                                        <!-- Social Icons Item 3 End -->
                                        <li class="list-inline-item">
                                            <a href="#" title="youtube"><i class="fab fa-2x fa-youtube"></i></a>
                                        </li>
                                        <!-- Social Icons Item 4 End -->
                                    </ul>
                                </div>
                                <!-- Social Icons End -->
                            </div>
                            <!-- Footer Widget Content End -->
                        </div>
                        <!-- Footer Widget End -->
                    </div>
                    <!-- Col End -->
                    <div class="col-md-2">
                        <div class="footer-widget">
                            <div class="widget">
                                <div class="widget-header">
                                    <h2 class="widget-title">Company</h2>
                                </div>
                                <div class="widget-content footer-menu">
                                    <ul class="f-link list-unstyled mb-0">
                                        <li>
                                            <a href="{{url('/about')}}">About Us</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/contact')}}">Contact</a>
                                        </li>
                                        <li>
                                            <a href="#">Help Center</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Widget Content End -->
                            </div>
                            <!-- Widget End -->
                        </div>
                        <!-- Footer Widget End -->
                    </div>
                    <!-- Col End -->
                    <div class="col-md-2">
                        <div class="footer-widget">
                            <div class="widget">
                                <div class="widget-header">
                                    <h2 class="widget-title">Get The Apps</h2>
                                </div>
                                <div class="widget-content footer-menu">
                                    <ul class="f-link list-unstyled mb-0">
                                        <li>
                                            <a href="#">IOS</a>
                                        </li>
                                        <li>
                                            <a href="#">Android</a>
                                        </li>
                                        <li>
                                            <a href="#">Amazon Fire</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Widget Content End -->
                            </div>
                            <!-- Widget End -->
                        </div>
                        <!-- Footer Widget End -->
                    </div>
                    <!-- Col End -->
                    <div class="col-md-2">
                        <div class="footer-widget">
                            <div class="widget">
                                <div class="widget-header">
                                    <h2 class="widget-title">Legel</h2>
                                </div>
                                <div class="widget-content footer-menu">
                                    <ul class="f-link list-unstyled mb-0">
                                        <li>
                                            <a href="#">Privacy Policy (Updated)</a>
                                        </li>
                                        <li>
                                            <a href="#">Terms of use</a>
                                        </li>
                                        {{-- <li>
                                            <a href="#">720p BluRay</a>
                                        </li> --}}
                                    </ul>
                                </div>
                                <!-- Widget Content End -->
                            </div>
                            <!-- Widget End -->
                        </div>
                        <!-- Footer Widget End -->
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row End -->
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center pt-5">
                    <div class="col-md-12 col-lg-6">
                        <p class="text-center text-muted m-0 p-0">© Copyright 2021, All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
            <!-- Container End -->
            
        <!-- Footer Section End -->

        <!-- Start Copyrights Section -->
        {{-- <div class="copyright">
            <div class="container-fluid">
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <p>© Copyright 2021, All Rights Reserved</p>
                    </div>
                    <!-- Col End -->
                    <div class="col-md-6">
                        <div class="copyright-menu text-right">
                            <ul>
                                <li>
                                    <a href="terms.html">Terms of Service</a>
                                </li>
                                <li>
                                    <a href="privacy.html">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Copyrights Menu End -->
                    </div>
                    <!-- Col End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div> --}}
        <!-- Copyrights Section End -->

        <!-- To Top Button Start-->
        <div class="back-to-top-btn">
            <div class="back-to-top" style="display: block;">
                <a aria-hidden="true" class="fas fa-angle-up" href="#"></a>
            </div>
        </div>
        <!-- To Top Button End -->

    </div>
    <!-- Main Class End -->

    <!-- Start Search Modal -->
    <div class="zoom-anim-dialog mfp-hide modal-searchPanel search-form" id="search-popup">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="search-panel">
                    <form class="search-group">
                        <div class="input-group">
                            <input class="form-control" name="s" placeholder="Search" type="search" value=""> <button class="input-group-btn search-button"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Search Modal -->

    <!-- Start Filter Sidebar -->
    <div class="filter-sidebar" id="f-Sidebar">
        <a class="closebtn" href="javascript:void(0)" onclick="closeNav()"><i class="fas fa-times"></i></a>
        <div class="filter-accordion" id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0"><button aria-controls="type" aria-expanded="false" class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-target="#type" data-toggle="collapse">Display Type <span class="icofont-circled-down"></span></button></h2>
                </div>
                <!-- Card Header End -->
                <div aria-labelledby="headingOne" class="collapse" data-parent="#accordion" id="type">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">All</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Drama</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Action</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Romantic</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Crime</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Excitement</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Comedy</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Ambiguity</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Adventures</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Fantasia</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Horror</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Fiction</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                    </div>
                    <!-- Card Body End -->
                </div>
                <!-- Type Collapse End -->
            </div>
            <!-- Card End -->
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0"><button aria-controls="production" aria-expanded="false" class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-target="#production" data-toggle="collapse">Year of Production <span class="icofont-circled-down"></span></button></h2>
                </div>
                <!-- Card Header End -->
                <div aria-labelledby="headingTwo" class="collapse" data-parent="#accordion" id="production">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">All</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2000</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2001</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2002</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2003</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2004</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2005</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2006</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2007</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2008</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2009</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2010</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2011</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2012</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2013</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2014</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2015</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2016</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2017</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2018</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2019</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2020</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2021</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-4 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">2022</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                    </div>
                    <!-- Card Body End -->
                </div>
                <!-- Production Collapse End -->
            </div>
            <!-- Card End -->
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0"><button aria-controls="quality" aria-expanded="false" class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-target="#quality" data-toggle="collapse">Display Quality <span class="icofont-circled-down"></span></button></h2>
                </div>
                <!-- Card Header End -->
                <div aria-labelledby="headingThree" class="collapse" data-parent="#accordion" id="quality">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">All</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">720p HDTV</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">1080p BluRay</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">720p BluRay</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">1080p WEB-DL</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">720p WEBRip</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">720p HD</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">1080p HD</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">HDTV</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">720p WEB-Dl</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                    </div>
                    <!-- Card Body End -->
                </div>
                <!-- Quality Collapse End -->
            </div>
            <!-- Card End -->
            <div class="card">
                <div class="card-header" id="headingFour">
                    <h2 class="mb-0"><button aria-controls="country" aria-expanded="false" class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-target="#country" data-toggle="collapse">Country of Production <span class="icofont-circled-down"></span></button></h2>
                </div>
                <!-- Card Header End -->
                <div aria-labelledby="headingThree" class="collapse" data-parent="#accordion" id="country">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">All</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">France</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Canada</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">China</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Argentina</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Australia</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">United States</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Germany</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Japan</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Italy</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                    </div>
                    <!-- Card Body End -->
                </div>
                <!-- Country Collapse End -->
            </div>
            <!-- Card End -->
            <div class="card">
                <div class="card-header" id="headingFive">
                    <h2 class="mb-0"><button aria-controls="language" aria-expanded="false" class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-target="#language" data-toggle="collapse">The Language <span class="icofont-circled-down"></span></button></h2>
                </div>
                <!-- Card Header End -->
                <div aria-labelledby="headingThree" class="collapse" data-parent="#accordion" id="language">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">All</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Arabic</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">English</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">German</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Spanish</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">French</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Italian</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Russian</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                        <div class="row">
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Japanese</a>
                            </div>
                            <!-- Col End -->
                            <div class="col-6 col-xl mb-xl-0">
                                <a class="btn d-block" href="#">Chinese</a>
                            </div>
                            <!-- Col End -->
                        </div>
                        <!-- Row End -->
                    </div>
                    <!-- Card Body End -->
                </div>
                <!-- Language Collapse End -->
            </div>
            <!-- Card End -->
        </div>
        <!-- Filter Accordion End -->
    </div>
    <!-- Filter Sidebar End -->

    <!-- Javascript Files
    ================================================== -->
    <!-- Initialize jQuery Library -->
    <script src="{{asset('frontend_assets/js/jquery.js')}}"></script>
    <!-- Popper jQuery -->
    <script src="{{asset('frontend_assets/js/popper.min.js')}}"></script>
    <!-- Bootstrap jQuery -->
    <script src="{{asset('frontend_assets/js/bootstrap.min.js')}}"></script>
    <!-- jQuery Owl Carousel -->
    <script src="{{asset('frontend_assets/js/owl.carousel.min.js')}}"></script>
    <!-- jQuery Slick Slider -->
    <script src="{{asset('frontend_assets/js/slick.min.js')}}"></script>
    <!-- jQuery Slick Animation -->
    <script src="{{asset('frontend_assets/js/slick-animation.min.js')}}"></script>
    <!-- jQuery Pop-up Search -->
    <script src="{{asset('frontend_assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- jQuery Swiper Slider -->
    <script src="{{asset('frontend_assets/js/swiper.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/swiper-custom.js')}}"></script>
    <!-- jQuery Datepicker -->
    <script src="{{asset('frontend_assets/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- JQuery Sidebar -->
    <script src="{{asset('frontend_assets/js/sidebar.js')}}"></script>
    <!-- Template Custom -->
    <script src="{{asset('frontend_assets/js/main.js')}}"></script>
    <script src="{{asset('frontend_assets/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{asset('jquery.steps.js')}}"></script>
    <script src="{{asset('main.js')}}"></script>
    <script>
        $("[data-toggle=popover]").popover();
        $('[data-toggle="tooltip"]').tooltip();
    </script>
    @yield('script')

</body>

</html>
