@extends('layouts.authentication')

@section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-4 mt-3">
                                <a href="{{ route('home') }}">
                                    <h1>CAFE SHOP</h1>
                                </a>
                            </div>
                            <div class="mt-4 pt-3 text-left">
                                <h3>Xin chào {{$name}}!</h3>
                                <p>Bạn nhận được email này bởi vì chúng tôi nhận được yêu cầu đặt lại mật khẩu từ tài khoản của bạn.</p>
                                <a href="{{ route('password.reset', ['token' => $token . '+'. $mail]) }}" class="btn btn-primary btn-block text-white">Đặt lại mật khẩu</a>
                                <p class="mt-3">Liên kết này sẽ bị vô hiệu hóa sau 60 phút.</p>
                                <p>Nếu bạn không thực hiện hành động này, vui lòng bỏ qua.</p>

                                <span>Trân trọng,</span>
                                <p>Cafe shop admin</p>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
