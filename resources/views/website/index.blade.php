<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Grow up with Grades</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('img/logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="{{ url('/') }}">home</a></li>
                                        <li><a href="#">Login <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('login.guardian') }}">Guardian Login</a></li>
                                                <li><a href="{{ route('login.student') }}">Student Login</a></li>
                                                <li><a href="{{ route('login.teacher') }}">Teacher Login</a></li>
                                                <li><a href="{{ route('login') }}">Admin Login</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area ">
        <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-6 col-md-6">
                        <div class="illastrator_png">
                            <img src="{{ asset('website/img/banner/edu_ilastration.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="slider_info">
                            <h3>An Application<br>
                                To Accelerate<br>
                                Your Learning</h3>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

   


 



 

    <!-- footer -->
    <footer class="footer footer_bg_1">
 
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Grow up with Grades 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->



    <!-- JS here -->
    <script src="{{ asset('website/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('website/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('website/js/popper.min.js') }}"></script>
    <script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('website/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('website/js/ajax-form.js') }}"></script>
    <script src="{{ asset('website/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('website/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('website/js/scrollIt.js') }}"></script>
    <script src="{{ asset('website/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('website/js/wow.min.js') }}"></script>
    <script src="{{ asset('website/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('website/js/plugins.js') }}"></script>
    <script src="{{ asset('website/js/gijgo.min.js') }}"></script>
    <script src="{{ asset('website/js/main.js') }}"></script>
</body>

</html>