<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('layouts.components.head')
</head>

<body>
    
    @include('layouts.components.preloader')

    @include('layouts.components.header')

    <main>
        @yield('content')
    </main>

    <footer class="site-footer dark-bg pt-125 position-relative">
        <div class="footer__top">
            <a href="#" class="go-top go-top__white position-absolute d-flex align-items-center justify-content-center">
                <i class="fal fa-long-arrow-up"></i>
            </a>
            <div class="container">
                <div class="row justify-content-center mt-none-30">
                    <div class="col-xl-3 col-lg-6 mt-30">
                        <div class="footer__widget footer__info">
                            <div class="item d-flex align-items-center justify-content-center">
                                <img src="assets/images/icons/ft-phone.png" alt="">
                                <span>Phone :</span>
                                <a href="tel:0964011656">(+84) 096 4011656</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 mt-30 pl-55">
                        <div class="footer__widget footer__info">
                            <div class="item d-flex align-items-center justify-content-start">
                                <img src="assets/images/icons/ft-map-marker.png" alt="">
                                <span>Địa chỉ :</span>
                                <p>HCM, VN</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__middle mt-65">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="footer__logo--content">
                            <img class="mb-15" src="assets/images/logo/logo.png" alt="">
                            <p>Giữ gìn vị ngon tuyệt hảo của cà phê.</p>
                        </div>
                    </div>
                    <div class="col-lg-5 align-self-end">
                        <div class="social-links d-flex align-items-center justify-content-lg-end">
                            <a href="home-3.html#0" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="home-3.html#0" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="home-3.html#0" target="_blank"><i class="fab fa-youtube"></i></a>
                            <a href="home-3.html#0" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                            <a href="home-3.html#0" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__menu-area mt-30 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="footer__menu">
                            <nav>
                                <ul>
                                    <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{route('home')}}">Trang Chủ</a></li>
                                    <li class="{{ (request()->is('about')) ? 'active' : '' }}"><a href="{{route('about')}}">Về chúng tôi</a></li>
                                    <li class="{{ (request()->is('shop/*')) ? 'active' : '' }}"><a href="menu.html">Shop</a></li>
                                    <li class="{{ (request()->is('blog')) ? 'active' : '' }}"><a href="reservation.html">Blog</a></li>
                                    <li class="{{ (request()->is('contact')) ? 'active' : '' }}"><a href="{{route('contact')}}">Liên Hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 text-center text-lg-end">
                        <a href="{{route('home')}}" class="go-top go-top__bottom">
                            <span>go top</span>
                            <i class="fal fa-long-arrow-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--========= JS Here =========-->
    <script src="{{asset('assets/js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.meanmenu.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/lightcase.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/tilt.jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/js/scrollwatch.js')}}"></script>
    <script src="{{asset('assets/js/sticky-header.js')}}"></script>
    <script src="{{asset('assets/js/waypoint.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfpGBFn5yRPvJrvAKoGIdj1O1aO9QisgQ"></script>
    <script src="{{asset('assets/js/jquery-ui-slider-range.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>