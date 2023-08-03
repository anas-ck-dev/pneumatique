<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('/assets/images/icons/favicon.png')}}">
<link rel="preload" href="{{ asset('/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')}}" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="{{ asset('/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="{{ asset('/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2" crossorigin="anonymous">

<script>
    WebFontConfig = {
        google: {
            families: ['Open+Sans:400,600', 'Poppins:400,500,600,700']
        }
    };
    (function(d) {
        var wf = d.createElement('script'),
            s = d.scripts[0];
        wf.src = '/assets/js/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
</script>

<!-- Plugins CSS File -->
<link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css')}}">

<!-- Main CSS File -->
<link rel="stylesheet" href="{{ asset('/assets/css/demo42.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/fontawesome-free/css/all.min.css')}}">

<!-- OUR CSS File -->
<link rel="stylesheet" href="{{ asset('/assets/css/style.css')}}">

<!-- CDN Jquery 3.7.0 -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>


<!-- Plugins CSS File -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<!-- Main CSS File -->
<link rel="stylesheet" href="assets/css/style.min.css">
<link rel="stylesheet" type="text/css" href="assets/vendor/simple-line-icons/css/simple-line-icons.min.css">

<!-- file Css for Icon Whatsapp Scrooll -->
<link rel="stylesheet" href="assets/css/icon_whatsapp.css">


</head>

<body>
    <div class="page-wrapper">


        <header class="header">


            <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
                <div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler text-dark mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a href="demo42.html" class="logo">
                            <img src="/assets/images/logobellhsen.png" class="w-100" width="202" height="80" alt="Porto Logo">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-right w-lg-max">
                        <div class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mb-0">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                            <div class="container">
                                <nav class="main-nav w-100">
                                    <ul class="menu w-100">

                                        <li class="active">
                                            <a href="demo42.html">Accueil</a>
                                        </li>
                                        <li>
                                            <a href="demo42-shop.html">Pneus</a>
                                            <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <a href="#" class="nolink">VARIATION 1</a>
                                                        <ul class="submenu">
                                                            <li><a href="demo42-shop.html" title="shop">Fullwidth Banner</a></li>
                                                            <li><a href="category-banner-boxed-slider.html">Boxed Slider
                                                                    Banner</a>
                                                            </li>
                                                            <li><a href="category-banner-boxed-image.html">Boxed Image
                                                                    Banner</a>
                                                            </li>
                                                            <!-- <li><a href="demo42-shop.html" title="shop">Left Sidebar</a></li>
                                                            <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                                                            <li><a href="category-off-canvas.html">Off Canvas Filter</a></li>
                                                            <li><a href="category-horizontal-filter1.html">Horizontal
                                                                    Filter1</a>
                                                            </li>
                                                            <li><a href="category-horizontal-filter2.html">Horizontal
                                                                    Filter2</a>
                                                            </li> -->
                                                        </ul>
                                                    </div>
                                                    <!-- <div class="col-lg-4">
                                                        <a href="#" class="nolink">VARIATION 2</a>
                                                        <ul class="submenu">
                                                            <li><a href="category-list.html">List Types</a></li>
                                                            <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll</a>
                                                            </li>
                                                            <li><a href="demo42-shop.html" title="shop">3 Columns Products</a></li>
                                                            <li><a href="category-4col.html">4 Columns Products</a></li>
                                                            <li><a href="category-5col.html">5 Columns Products</a></li>
                                                            <li><a href="category-6col.html">6 Columns Products</a></li>
                                                            <li><a href="category-7col.html">7 Columns Products</a></li>
                                                            <li><a href="category-8col.html">8 Columns Products</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4 p-0">
                                                        <div class="menu-banner">
                                                            <figure>
                                                                <img src="/assets/images/menu-banner.jpg" width="192" height="313"
                                                                    alt="Menu banner">
                                                            </figure>
                                                            <div class="banner-content">
                                                                <h4>
                                                                    <span class="">UP TO</span><br />
                                                                    <b class="">50%</b>
                                                                    <i>OFF</i>
                                                                </h4>
                                                                <a href="demo42-shop.html" class="btn btn-sm btn-dark">SHOP NOW</a>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div><!-- End .megamenu -->
                                        </li>
                                        <li><a href="" rel="noopener" target="_blank">Chambre aire</a>
                                        </li>
                                        <li><a href="" rel="noopener" target="_blank">Materials</a>
                                        </li>
                                        <li><a href="" rel="noopener" target="_blank">Services</a>
                                        </li>
                                        <li><a href="{{route('contact')}}">Contact</a></li>
                                        <li><a href="{{route('about')}}">About</a></li>


                                    </ul>
                                </nav>
                            </div>
                        </div><!-- End .header-search -->


                        <div class="sicon-box mb-0 d-none d-lg-flex align-items-center pr-3 mr-1">
                            <div class=" sicon-default">
                                <i class="icon-phone-1"></i>
                            </div>
                            <div class="sicon-header">
                                <h4 class="sicon-title ls-n-25">APPELEZ-NOUS MAINTENANT</h4>
                                <p>0532081605 </p>
                                <p>0664345982 </p>

                            </div> <!-- header -->
                        </div>

                        <!-- <span class="separator d-none d-lg-block mr-4"></span>

                        <a href="login.html" class="d-lg-block d-none">
                            <div class="header-user">
                                <i class="icon-user-2"></i>
                                <div class="header-userinfo">
                                    <span>Welcome</span>
                                    <h4>Sign In / Register</h4>
                                </div>
                            </div>
                        </a> -->



                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->


        </header><!-- End .header -->