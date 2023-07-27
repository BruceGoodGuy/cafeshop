<!-- header start -->
<header class="site-header">
    <div class="header-top header-top__2">
        <div class="container-fluid custom-width">
            <div class="row">
                <div class="col-xl-6 col-lg-12 align-self-center">
                    <div class="header-top__left d-flex align-items-center">
                        <div class="logo">
                            <a href="{{route('home')}}">
                                <img src="assets/images/logo/logo-black.png" alt="img">
                            </a>
                        </div>
                        <ul class="header-top__infos pl-75 list-unstyled d-flex align-items-center mb-0">
                            <li><a href="tel:0964011656"><i class="fas fa-phone-square"></i> 096 4011656</a></li>
                            <li><i class="fa fa-map-marker-alt"></i> Hồ Chí Minh</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12  align-self-center">
                    <div class="header-top__right header-top__right--2 d-flex justify-content-xl-end justify-content-center align-items-center">
                        <div class="social-links social-links__2 d-flex align-items-center justify-content-md-start justify-content-center">
                            <a href="home-3.html#0" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="home-3.html#0" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="home-3.html#0" target="_blank"><i class="fab fa-youtube"></i></a>
                            <a href="home-3.html#0" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                            <a href="home-3.html#0" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>
                        {{-- <a href="home-3.html#0" class="site-btn">testy Coffee</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-area menu-area-2 custom-padding">
        <div class="container-fluid custom-width">
            <div class="row">
                <div class="col-xl-8 col-lg-9 col-6">
                    <div class="logo mm-only d-md-block d-lg-none">
                        <a href="{{route('home')}}">
                            <img src="assets/images/logo/logo-black.png" alt="img">
                        </a>
                    </div>
                    <div class="main-menu main-menu__2">
                        <nav id="mobile-menu">
                            <ul>
                                <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{route('home')}}">Trang Chủ</a></li>
                                <li class="{{ (request()->is('about')) ? 'active' : '' }}"><a href="{{route('about')}}">Về Chúng Tôi</a></li>
                                <li class="{{ (request()->is('shop/*')) ? 'active' : '' }}"><a href="menu.html">Shop</a></li>
                                <li class="{{ (request()->is('blog')) ? 'active' : '' }}"><a href="reservation.html">Blog</a></li>
                                <li class="{{ (request()->is('contact')) ? 'active' : '' }}"><a href="{{route('contact')}}">Liên Hệ</a>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-6 align-self-center">
                    <div class="menu-area__right menu-area__right--2 d-flex justify-content-end align-items-center">
                        <div class="search">
                            <div class="search__trigger item">
                                <span class="open"><i class="far fa-search"></i></span>
                                <span class="close"><i class="fal fa-times"></i></span>
                            </div>
                            <div class="search__form">
                                <form role="search" method="get" action="{{route('home')}}">
                                    <input type="search" name="s" value="" placeholder="Search Keywords">
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="hamburger-trigger item">
                            <i class="far fa-bars"></i>
                        </div>
                        <div class="cart cart-trigger item position-relative">
                            <i class="fa fa-shopping-basket"></i>
                            <span class="cart__count">3</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->

<!-- side info for mobile view -->
<aside class="side-info-wrapper mm-only">
    <nav>
        <div class="nav" id="nav-tab" role="tablist">
            <a class="nav-link active" id="menu-tab-1-tab" data-bs-toggle="tab"
                href="home-3.html#menu-tab-1" role="tab" aria-controls="menu-tab-1"
                aria-selected="true">Menu</a>
            <a class="nav-link" id="menu-tab-2-tab" data-bs-toggle="tab" href="home-3.html#menu-tab-2"
                role="tab" aria-controls="menu-tab-2" aria-selected="false">Info</a>
        </div>
    </nav>
    <div class="side-info__wrapper d-flex align-items-center justify-content-between">
        <div class="side-info__logo">
            <a href="{{route('home')}}">
                <img src="assets/images/logo/logo-black.png" alt="logo">
            </a>
        </div>
        <div class="side-info__close">
            <a href="javascript:void(0);"><i class="fal fa-times"></i></a>
        </div>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="menu-tab-1" role="tabpanel"
            aria-labelledby="menu-tab-1-tab">
            <div class="mobile-menu"></div>
        </div>
        <div class="tab-pane fade" id="menu-tab-2" role="tabpanel"
            aria-labelledby="menu-tab-2-tab">
            <div class="side-info">
                <div class="side-info__content mb-35">
                    <h4 class="title mb-5">Giới thiệu</h4>
                    <p>Chúng tôi tự hào mang đến các loại phê ngon và nổi tiếng với chất lượng hàng đầu.</p>
                    <a class="site-btn mt-20" href="{{route('contact')}}">Địa chỉ</a>
                </div>
                <div class="contact__info--wrapper mt-15">
                    <h4 class="title mb-10">Địa chỉ</h4>
                    <ul class="contact__info list-unstyled">
                        <li>
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            <p>HCM city, Viet Nam</p>
                        </li>
                        <li>
                            <span><i class="fas fa-phone"></i></span>
                            <p>+1255-568-6523</p>
                        </li>
                        <li>
                            <span><i class="fas fa-envelope-open-text"></i></span>
                            <p>information@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <div class="social-links mt-20 d-flex justify-content-start align-items-center">
                    <a href="home-3.html#0"><i class="fab fa-facebook-f"></i></a>
                    <a href="home-3.html#0"><i class="fab fa-twitter"></i></a>
                    <a href="home-3.html#0"><i class="fab fa-google-plus-g"></i></a>
                    <a href="home-3.html#0"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</aside>

<!-- side info for desktop view -->
<aside class="side-info-wrapper show-all">
    <div class="side-info__wrapper d-flex align-items-center justify-content-between">
        <div class="side-info__logo">
            <a href="{{route('home')}}">
                <img src="assets/images/logo/logo-black.png" alt="logo">
            </a>
        </div>
        <div class="side-info__close">
            <a href="javascript:void(0);"><i class="fal fa-times"></i></a>
        </div>
    </div>
    <div class="side-info">
        <div class="side-info__content mb-35">
            <h4 class="title mb-5">Giới thiệu</h4>
            <p>Chúng tôi tự hào mang đến các loại phê ngon và nổi tiếng với chất lượng hàng đầu.</p>
            <a class="site-btn mt-20" href="{{route('contact')}}">Liên Hệ</a>
        </div>
        <div class="contact__info--wrapper mt-15">
            <h4 class="title mb-10">Địa chỉ</h4>
            <ul class="contact__info list-unstyled">
                <li>
                    <span><i class="fas fa-map-marker-alt"></i></span>
                    <p>HCM city, Viet Nam</p>
                </li>
                <li>
                    <span><i class="fas fa-phone"></i></span>
                    <p>+1255-568-6523</p>
                </li>
                <li>
                    <span><i class="fas fa-envelope-open-text"></i></span>
                    <p>information@gmail.com</p>
                </li>
            </ul>
        </div>
        <div class="social-links mt-20 d-flex justify-content-start align-items-center">
            <a href="home-3.html#0"><i class="fab fa-facebook-f"></i></a>
            <a href="home-3.html#0"><i class="fab fa-twitter"></i></a>
            <a href="home-3.html#0"><i class="fab fa-google-plus-g"></i></a>
            <a href="home-3.html#0"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</aside>

<!-- cart list -->
<aside class="cart-bar-wrapper">
    <div class="cart-bar__close">
        <a class="d-flex align-items-center justify-content-center" href="javascript:void(0);"><i class="fal fa-times"></i></a>
    </div>
    <div class="cart-bar">
        <h4 class="cart-bar__title">Cart Items - <span>4</span></h4>
        <div class="cart-bar__lists">
            <div class="cart-bar__item position-relative d-flex">
                <div class="thumb">
                    <img src="assets/images/top-grade/tg-1.png" alt="image_not_found">
                </div>
                <div class="content">
                    <h4 class="title">
                        <a href="product-details.html">Rorem ipsum dolor sit amet.</a>
                    </h4>
                    <span class="price">$19.00</span>
                    <a href="home-3.html#0" class="remove"><i class="fal fa-times"></i></a>
                </div>
            </div>
            <div class="cart-bar__item position-relative d-flex">
                <div class="thumb">
                    <img src="assets/images/top-grade/tg-2.png" alt="image_not_found">
                </div>
                <div class="content">
                    <h4 class="title">
                        <a href="product-details.html">Rorem ipsum dolor sit amet.</a>
                    </h4>
                    <span class="price">$36.00</span>
                    <a href="home-3.html#0" class="remove"><i class="fal fa-times"></i></a>
                </div>
            </div>
            <div class="cart-bar__item position-relative d-flex">
                <div class="thumb">
                    <img src="assets/images/top-grade/tg-3.png" alt="image_not_found">
                </div>
                <div class="content">
                    <h4 class="title">
                        <a href="product-details.html">Rorem ipsum dolor sit amet.</a>
                    </h4>
                    <span class="price">$20.00</span>
                    <a href="home-3.html#0" class="remove"><i class="fal fa-times"></i></a>
                </div>
            </div>
            <div class="cart-bar__item position-relative d-flex">
                <div class="thumb">
                    <img src="assets/images/top-grade/tg-4.png" alt="image_not_found">
                </div>
                <div class="content">
                    <h4 class="title">
                        <a href="product-details.html">Rorem ipsum dolor sit amet.</a>
                    </h4>
                    <span class="price">$20.00</span>
                    <a href="home-3.html#0" class="remove"><i class="fal fa-times"></i></a>
                </div>
            </div>
        </div>
        <div class="cart-bar__subtotal d-flex align-items-center justify-content-between">
            <span>Sub Total:</span>
            <span>$87.00</span>
        </div>
        <div class="btns d-flex align-items-center justify-content-center">
            <a href="cart.html" class="site-btn">View Cart</a>
            <a href="checkout.html" class="site-btn site-btn__borderd">Checkout</a>
        </div>
    </div>
</aside>
<div class="overlay"></div>