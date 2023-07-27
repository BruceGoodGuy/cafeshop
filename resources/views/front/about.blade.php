@extends('layouts.main')

@section('content')
    <!-- breadcrumb area start -->
    <section class="breadcrumb-area pt-140 pb-140 bg_img" data-background="assets/images/bg/breadcrumb-bg-1.jpeg" data-overlay="dark" data-opacity="5">
        <div class="shape shape__1"><img src="assets/images/shape/breadcrumb-shape-1.png" alt=""></div>
        <div class="shape shape__2"><img src="assets/images/shape/breadcrumb-shape-2.png" alt=""></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <h2 class="page-title">Về Cafena</h2>
                    <div class="cafena-breadcrumb breadcrumbs">
                        <ul class="list-unstyled d-flex align-items-center justify-content-center">
                            <li class="cafenabcrumb-item duxinbcrumb-begin">
                                <a href="{{route('home')}}"><span>Trang chủ</span></a>
                            </li>
                            <li class="cafenabcrumb-item duxinbcrumb-end">
                                <span>Về chúng tôi</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- about area start -->
    <section class="about__area about__area--2 position-relative pt-125 pb-105">
        <span class="shape shape__1 position-absolute"><img src="assets/images/shape/about-shape-2-1.png" alt=""></span>
        <span class="shape shape__2 position-absolute"><img src="assets/images/shape/about-shape-2-2.png" alt=""></span>
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-7">
                    <div class="about__left about__left--2 position-relative">
                        <img class="big" src="assets/images/about/about-img-2-1.png" alt="img">
                        <img class="small position-absolute" src="assets/images/about/about-img-2-2.png" alt="img">
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-1">
                    <div class="about__right about__right--2 pl-45 pt-45">
                        <div class="section-heading section-heading__black">
                            <span class="sub-title">về Cafena</span>
                            <h2 class="title mb-25">Một trong những nhà cung cấp hạt cà phê tốt nhất</h2>
                            <p>Chúng tôi tự hào mang đến các loại phê ngon và nổi tiếng với chất lượng hàng đầu.</p>
                        </div>
                        <ul class="about__list list-unstyled mt-25">
                            <li><span class="icon"><i class="fal fa-check"></i></span> Chất lượng hàng đầu.</li>
                            <li><span class="icon"><i class="fal fa-check"></i></span> Đa dạng sản phẩm.</li>
                            <li><span class="icon"><i class="fal fa-check"></i></span> Dịch vụ khách hàng tận tâm. </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about area end -->

    <!-- wcu section start -->
    <section class="wcu__area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="section-heading section-heading__black mb-60">
                        <span class="sub-title">Tại sao chọn chúng tôi?</span>
                        <h2 class="title">Chúng tôi cung dịch vụ tốt nhất <br>
                            trong khu vực của bạn</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-none-30">
                <div class="col-xl-4 col-lg-6 col-md-6 mt-30 text-center">
                    <div class="wcu__item h-100">
                        <div class="icon">
                            <img src="assets/images/icons/wcu-1.png" alt="">
                        </div>
                        <div class="content">
                            <h2 class="title">Chất lượng tốt</h2>
                            <p>Những hạt cà phê được lựa chọn kĩ lưỡng với quy trình rang sấy khép kín hàng đầu. Đảm bảo chất lượng cà phê luôn luôn tuyệt hảo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 mt-30 text-center">
                    <div class="wcu__item h-100">
                        <div class="icon">
                            <img src="assets/images/icons/wcu-2.png" alt="">
                        </div>
                        <div class="content">
                            <h2 class="title">Giao hàng nhanh</h2>
                            <p>Hỗ trợ đa dạng loại hình giao hàng với khu vực giao mở rộng cả nước.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 mt-30 text-center">
                    <div class="wcu__item h-100">
                        <div class="icon">
                            <img src="assets/images/icons/wcu-1.png" alt="">
                        </div>
                        <div class="content">
                            <h2 class="title">Dịch vụ tốt</h2>
                            <p>Luôn luôn sẵn sàng lắng nghe và phản hồi nhanh nhất có thể để phục vụ thật tốt khách hàng.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- wcu section end -->

    <!-- best-coffe section start -->
    <div class="best-coffe__area position-relative">
        <div class="best-coffe__bg">
            <img src="assets/images/bg/best-coffe-1.jpeg" alt="">
        </div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-8 pl-35">
                    <div class="best-coffe__wrapper">
                        <div class="section-heading section-heading__black">
                            <h2 class="title mb-25">Luôn cố gắng để trở thành ưu tiên hàng đầu của khách hàng</h2>
                            <p>Chúng tôi đang nổ lực từng ngày để cải thiện và nâng cao chất lượng dịch vụ, xứng đáng trở thành nhà cung cấp hạt cà phê yêu thích của bạn.</p>
                            <p>Mọi ý kiến của khách hàng xứng đáng nhận được sự tôn trọng của chúng tôi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- best-coffe section end -->
@endsection