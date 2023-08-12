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
                            <form class="p-2" action="{{ route('authentication') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="emailaddress">Địa chỉ email:</label>
                                    <input required name="email" class="form-control @error('email') is-invalid @enderror"
                                        type="email" id="emailaddress" placeholder="admin@admin.com" value="{{old('email')}}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}<span>
                                            @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input required name="password"
                                        class="form-control @error('password') is-invalid @enderror" type="password"
                                        id="password" placeholder="Nhập mật khẩu" value="{{old('password')}}">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}<span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4 pb-3">
                                    <div class="custom-control custom-checkbox checkbox-primary">
                                        <input name="remember" type="checkbox" class="custom-control-input"
                                            id="checkbox-signin" @if (old('remember')) checked @endif>
                                        <label class="custom-control-label" for="checkbox-signin">Ghi nhớ đăng nhập</label>
                                        <a href="{{ route('password.forget') }}" class="text-muted float-right">Quên mật khẩu?</a>
                                    </div>
                                </div>
                                @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                        <ul class="mb-0">
                                            <li>{!! \Session::get('success') !!}</li>
                                        </ul>
                                    </div>
                                @endif
                                @if (\Session::has('danger'))
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            <li>{!! \Session::get('danger') !!}</li>
                                        </ul>
                                    </div>
                                @endif
                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> Đăng Nhập </button>
                                </div>
                                <p>Đăng nhập theo cách khác:</p>
                                <div class="mb-3">
                                    <button class="btn btn-danger" type="button"> Google </button>
                                </div>

                            </form>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                    <div class="row mt-4">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted mb-0">Không có tài khoản? <a href="pages-register.html"
                                    class="text-dark ml-1"><b>Đăng kí ngay</b></a></p>
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
