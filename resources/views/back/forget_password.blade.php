@extends('layouts.authentication')

@section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-4 mt-3">
                                <a href="#">
                                    <span><img src="{{ asset('back/assets/images/logo-dark.png') }}" alt=""
                                            height="30"></span>
                                </a>
                            </div>
                            <div class="text-center">
                                <p class="text-muted w-75 mx-auto"> Vui lòng nhập địa chỉ email đăng nhập và chúng tôi sẽ gởi tới bạn một email với hướng dẫn để reset mật khẩu. </p>
                            </div>
                            <form action="{{ route('password.post.forget') }}" class="p-2" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="emailaddress">Địa chỉ email</label>
                                    <input class="form-control @if (session('success')) is-valid @endif @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" type="email" id="emailaddress" required=""
                                        placeholder="john@deo.com">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}<span>
                                    @enderror

                                    @if (session('success'))
                                        <span class="text-success">{{ session('success') }}<span>
                                    @endif
                                </div>
                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> Reset mật khẩu </button>
                                </div>
                            </form>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                    <div class="row mt-4">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted mb-0">Quay lại <a href="{{ route('login') }}" class="text-dark ml-1"><b>Đăng
                                        Nhập</b></a></p>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
