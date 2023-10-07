
<head>
    <title>eTrade || Register_step-2</title>
    @include("layouts.style_links")
</head>

<body>
    <div class="axil-signin-area">

        <!-- Start Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="/" class="site-logo"><img src="assets/images/logo/logo.png" alt="logo"></a>
                </div>
                <div class="col-md-6">
                    <div class="singin-header-btn">
                        <p>Already a member?</p>
                        <a href="{{ route('login.perform') }}" class="axil-btn btn-bg-secondary sign-up-btn">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image bg_image--10">
                    <h3 class="title">We Offer the Best Products</h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">I'm New Here</h3>
                        <p class="b2 mb--55">Enter your detail below</p>
                        <form class="singin-form" action="{{ route('register.perform') }}" >
                            <div class="form-group">
                                <label for="costemer_id">Costumer</label>
                                <input type="radio" class="form-control" id="costemer_id"  name="costemer_id" value="{{ old('costemer_id') }}" placeholder="Username" required="required" autofocus>
                                <input type="radio" class="form-control" name="costemer_id" value="{{ old('costemer_id') }}" placeholder="Username" required="required" autofocus>
                                @if ($errors->has('costemer_id'))
                                    <span class="text-danger text-left">{{ $errors->first('costemer_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb--55">
                                <label for="sortSelect">city</label>
                                <select id="sortSelect" class="single-select">
                                    <option selected> -- select your country</option>
                                    <option value="Larache">Larache</option>
                                    <option value="Tanger">Tanger</option>
                                    <option value="Rabat">Rabat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('username') }}" placeholder="name@example.com" required="required" autofocus> 
                                @if ($errors->has('email'))
                                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                                @if ($errors->has('password'))
                                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation')}}" placeholder="Confirm Password" required="required">
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include("layouts.script_links")
</body>
