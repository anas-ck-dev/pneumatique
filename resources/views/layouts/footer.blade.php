<footer class="footer bg-dark position-relative" style="background:#000!important">
    <div class="footer-middle">
        <div class="container position-static">
            <div class="row">
                <div class="col-lg-3 col-sm-6 pb-2 pb-sm-0 d-flex align-items-center">
                    <div class="widget m-b-3 footer-logo">
                        <a href="/"><img src="/assets/images/logobellhsen.png" alt="belhassan Logo"></a>

                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6 pb-4 pb-sm-0">
                    <div class="widget mb-2 center-flex" style="">
                        <ul class="contact-info center-flex">
                            <li >
                                <span class="contact-info-label">Address:</span><a target="_blanck" href="https://www.google.com/maps/place/Pneumatiques+belhassan/@33.9425607,-5.2201479,17z/data=!3m1!4b1!4m6!3m5!1s0xda02542b0885c87:0xeee71410cc6cfc3b!8m2!3d33.9425563!4d-5.217573!16s%2Fg%2F11h84z26ft?entry=ttu">
                                    Pneumatiques belhassan, 51100, Ain
                                Taoujdate 51100</a>
                            </li>
                            <li>
                                <span class="contact-info-label">Phone:</span><a href="tel:+212664345982">+212 664345982</a>
                            </li>

                            <li>
                                <span class="contact-info-label">Working Days/Hours:</span>
                                Mon - Sun / 9:00 AM - 8:00 PM
                            </li>
                        </ul>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/people/Belhassan-Spb/pfbid02tjWbENJZXiu7Xi9gHSwv47bSwnkGADwvrv2inWN2TMSAiVaHQsgfPCotEVcqYbRFl/?mibextid=LQQJ4d"
                                class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                            <a href="https://instagram.com/belhassan_spb?igshid=Y2I2MzMwZWM3ZA=="
                                class="social-icon social-instagram icon-instagram" target="_blank" title="instagram">
                            </a>

                        </div><!-- End .social-icons -->
                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6 pb-2 pb-sm-0">
                    <div class="widget center-flex">
                        <h4 class="widget-title pb-1">Rapide lien</h4>

                        <ul class="links rapid-links">
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

                    </div><!-- End .widget -->
                </div><!-- End .col-lg-3 -->


            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="container">
        <div class="footer-bottom d-sm-flex align-items-center " style="background:#000!important" >
            <div class="footer-left pl-5">
                <span class="footer-copyright">Pneumatique Belhassan. © 2023. All Rights Reserved</span>
            </div>


        </div>
    </div><!-- End .footer-bottom -->
</footer>
</div>

<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
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

        <div class="social-icons">
            <a href="https://www.facebook.com/people/Belhassan-Spb/pfbid02tjWbENJZXiu7Xi9gHSwv47bSwnkGADwvrv2inWN2TMSAiVaHQsgfPCotEVcqYbRFl/?mibextid=LQQJ4d"
                class="social-icon social-facebook icon-facebook" target="_blank" title="facebook">
            </a>

            <a href="https://instagram.com/belhassan_spb?igshid=Y2I2MzMwZWM3ZA=="
                class="social-icon social-instagram icon-instagram" target="_blank" title="instagram">
            </a>
        </div>
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->


<div class="phone-call cbh-phone cbh-green cbh-show  cbh-static" id="clbh_phone_div" style="">
    <a id="WhatsApp-button" href="https://wa.me/212664345982" target="_blank" class="phoneJs"
        title="WhatsApp 360imagem">
        <div class="cbh-ph-circle"></div>
        <div class="cbh-ph-circle-fill"></div>
        <div class="cbh-ph-img-circle1"></div>
    </a>
</div>

{{-- <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a> --}}

<!-- Plugins JS File -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/js/optional/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('/assets/js/plugins.min.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.appear.min.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.plugin.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('/assets/js/main.min.js') }}"></script>
<script>
    (function() {
        var js =
            "window['__CF$cv$params']={r:'7e41bb8e38741854',m:'ZtJgruW5gPYGuFgw7YgisfiFJGW86guwxfpe7uxGT.Y-1688917931-0-AeqjtFZftk3M33h30vfxRAvas8oq94x5EWw+w54Y7iU6'};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../../cdn-cgi/challenge-platform/h/g/scripts/jsd/19b997cb/invisible.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";
        var _0xh = document.createElement('iframe');
        _0xh.height = 1;
        _0xh.width = 1;
        _0xh.style.position = 'absolute';
        _0xh.style.top = 0;
        _0xh.style.left = 0;
        _0xh.style.border = 'none';
        _0xh.style.visibility = 'hidden';
        document.body.appendChild(_0xh);

        function handler() {
            var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
            if (_0xi) {
                var _0xj = _0xi.createElement('script');
                _0xj.nonce = '';
                _0xj.innerHTML = js;
                _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
            }
        }
        if (document.readyState !== 'loading') {
            handler();
        } else if (window.addEventListener) {
            document.addEventListener('DOMContentLoaded', handler);
        } else {
            var prev = document.onreadystatechange || function() {};
            document.onreadystatechange = function(e) {
                prev(e);
                if (document.readyState !== 'loading') {
                    document.onreadystatechange = prev;
                    handler();
                }
            };
        }
    })();


</script>
</body>
