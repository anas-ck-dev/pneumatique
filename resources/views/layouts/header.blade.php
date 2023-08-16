<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="@yield('icon', asset('/assets/images/logobbvbellhsen.png') )">
<link rel="preload" href="{{ asset('/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2') }}" as="font"
    type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="{{ asset('/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }}" as="font"
    type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="{{ asset('/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2') }}" as="font"
    type="font/woff2" crossorigin="anonymous">

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
<link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">

<!-- Main CSS File -->
<link rel="stylesheet" href="{{ asset('/assets/css/demo42.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/fontawesome-free/css/all.min.css') }}">

<!-- OUR CSS File -->
<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">

<!-- CDN Jquery 3.7.0 -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>


<!-- Plugins CSS File -->
<link rel="stylesheet" href="/assets/css/bootstrap.min.css">

<!-- Main CSS File -->
<link rel="stylesheet" href="/assets/css/style.min.css">
<link rel="stylesheet" type="text/css" href="/assets/vendor/simple-line-icons/css/simple-line-icons.min.css">

<!-- file Css for Icon Whatsapp Scrooll -->
<link rel="stylesheet" href="/assets/css/icon_whatsapp.css">



</head>

<body>
    <div class="page-wrapper">


        <header class="header">


            <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
                <div class="container">
                    <div class="header-left col-lg-2 pl-0 header-mobil-1">
                        <button class="mobile-menu-toggler text-dark mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="div-logo">

                            <a href="/" class="">
                                <img  src="/assets/images/logobellhsen.png"
                                alt="belhassan Logo" class="logo-mobil">
                            </a>
                        </div>
                    </div><!-- End .header-left -->

                    <div class="header-right w-lg-max">
                        <div
                            class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mb-0">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                            <div class="container">
                                <nav class="main-nav w-100">
                                    <ul class="menu w-100">

                                        <li class="">
                                            <a href="/">Accueil</a>
                                        </li>

                                        <li @if (str_contains(Request::url(), 'about')) class="active" @endif>
                                            <a href="{{ route('about') }}">About</a>
                                        </li>
                                        <li @if (str_contains(Request::url(), 91)) class="active" @endif>
                                            <a href="{{ route('category.listing', 91) }}">Pneus</a>
                                        </li>
                                        <li @if (str_contains(Request::url(), 90)) class="active" @endif>
                                            <a href="{{ route('category.listing', 90) }}">Chambre aire</a>
                                        </li>
                                        <li @if (str_contains(Request::url(), 89)) class="active" @endif>
                                            <a href="{{ route('category.listing', 89) }}">Materials</a>
                                        </li>
                                        <li @if (str_contains(Request::url(), 93)) class="active" @endif>
                                            <a href="{{ route('category.listing', 93) }}">Services</a>
                                        </li>
                                        <li @if (str_contains(Request::url(), 'contact')) class="active" @endif>
                                            <a href="{{ route('contact') }}">Contact</a>
                                        </li>



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
